<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhuyenMai;
use App\Models\DanhMucSanPham;
use App\Http\Requests\KhuyenMaiRequest;
use App\Http\Requests\UpdateKhuyenMaiRequest;
use App\Models\SanPham;
use Carbon\Carbon;

class KhuyenMaiController extends Controller
{
    public function index()
    {

        $menuCha = DanhMucSanPham::where('id_danh_muc_cha', 0)
                                 ->where('tinh_trang', 1)
                                 ->get();

        $dsKhuyenMai = KhuyenMai::join('san_phams','san_phams.id','khuyen_mais.san_pham_id')
                                ->select('khuyen_mais.*','san_phams.ten_san_pham')
                                ->get();
        $sanPham = SanPham::all();
        return view('admin.pages.khuyen_mai.index',compact("menuCha",'dsKhuyenMai','sanPham'));
    }

    public function sanPhamKhuyenMai($id)
    {
        $sanPham = SanPham::where('id_danh_muc', $id)
                                 ->orderBy('ten_san_pham', 'asc')
                                 ->get();
        return response()->json([
            'sanPham'   => $sanPham,
        ]);
    }

    public function store(KhuyenMaiRequest $request)
    {
        // Lấy sản phẩm cần khuyến mãi
        $sanPham = SanPham::where('id', $request->san_pham_id)->first();

        // Kiểm tra mức giảm không vượt quá giá bán
        if ($request->muc_giam >= $sanPham->gia_ban) {
            return response()->json([
                "status" => 0,
                "message" => "Mức giảm đã lớn hơn giá bán của sản phẩm này!"
            ]);
        }
        if($sanPham){
            // Tạo mới đợt khuyến mãi
            $data = $request->all();
            $khuyenMai = KhuyenMai::create($data);

            // Cập nhật giá khuyến mãi cho sản phẩm
            if (Carbon::now()->between($khuyenMai->thoi_gian_bat_dau, $khuyenMai->thoi_gian_ket_thuc)) {
                $sanPham->gia_khuyen_mai = $sanPham->gia_ban - $khuyenMai->muc_giam;
            } else {
                $sanPham->gia_khuyen_mai = 0;
            }
            $sanPham->save();

            // Xóa các đợt khuyến mãi cũ của sản phẩm này
            KhuyenMai::where('san_pham_id', $request->san_pham_id)
                    ->where('id', '<>', $khuyenMai->id)
                    ->delete();

            return response()->json(["status" => 1]);
        } else{
            return response()->json(["status" => false]);
        }


    }


    public function delete($id)
    {
        $khuyenMai = KhuyenMai::find($id);
        if($khuyenMai){
            $khuyenMai->delete();

            // Cập nhật giá sản phẩm nếu đợt khuyến mãi đã bị xóa hoặc hết hạn
            $sanPham = SanPham::where('id', $khuyenMai->san_pham_id)->first();
            if ($sanPham->gia_khuyen_mai != 0 && $sanPham->gia_khuyen_mai == $sanPham->gia_ban - $khuyenMai->muc_giam) {
                $sanPham->gia_khuyen_mai = 0;
                $sanPham->save();
            }

            return response()->json([
                "status" => true
            ]);
        } else{
            return response()->json([
                'status'       => false,
            ]);
        }
    }

    public function getData()
    {
        $data = KhuyenMai::join('san_phams','khuyen_mais.san_pham_id','san_phams.id')
                        ->select("khuyen_mais.*", 'san_phams.ten_san_pham')
                        ->get();
        return response()->json([
            'khuyen_mai'         => $data,
        ]);
    }

    public function edit($id)
    {
        $data = KhuyenMai::find($id);
        if($data){
            return response()->json([
                'edit'      => true,
                'data'      => $data,
            ]);
        } else{
            return response()->json([
                'edit'        => false,
            ]);
        }
    }

    public function update(UpdateKhuyenMaiRequest $request)
    {
        $data = $request->all();
        $khuyen_mai = KhuyenMai::find($request->id);

        // Xóa giá khuyến mãi của các sản phẩm trong sản phẩm cũ
        $sanPhamCu = SanPham::where('id', $khuyen_mai->san_pham_id)->first();
        $sanPhamCu->gia_khuyen_mai = 0;
        $sanPhamCu->save();

        $khuyen_mai->update($data);
        if($khuyen_mai){
            // Lấy tất cả sản phẩm trong sản phẩm mới
            $sanPhamMoi = SanPham::where('id', $request->san_pham_id)->first();
            // Lưu trữ giá khuyến mãi trước khi kiểm tra mức giảm
            $gia_khuyen_mai_cu = $sanPhamMoi->gia_khuyen_mai;
            // Kiểm tra mức giảm không vượt quá giá bán
            if ($request->muc_giam >= $sanPhamMoi->gia_ban) {
                // Khôi phục giá khuyến mãi trước đó nếu mức giảm lớn hơn hoặc bằng giá bán
                $sanPhamMoi->gia_khuyen_mai = $gia_khuyen_mai_cu;
                $sanPhamMoi->save();
                return response()->json([
                    "update" => 0,
                    "message" => "Mức giảm không được lớn hơn hoặc bằng giá bán của sản phẩm này!"
                ]);
            }
            // Kiểm tra nếu đang trong thời gian khuyến mãi
            if (Carbon::now()->between($khuyen_mai->thoi_gian_bat_dau, $khuyen_mai->thoi_gian_ket_thuc)) {
                $sanPhamMoi->gia_khuyen_mai = $sanPhamMoi->gia_ban - $khuyen_mai->muc_giam;
            } else {
                $sanPhamMoi->gia_khuyen_mai = 0;
            }
            $sanPhamMoi->save();

            // Xóa các đợt khuyến mãi cũ của danh mục này
            KhuyenMai::where('san_pham_id', $request->san_pham_id)->where('id', '<>', $khuyen_mai->id)->delete();
            return response()->json([
                'update' => 1,
            ]);
        } else {
            return response()->json([
                'update' => false,
            ]);
        }
    }
    // public function update(UpdateKhuyenMaiRequest $request)
    // {
    //     $data = $request->all();
    //     $khuyen_mai = KhuyenMai::find($request->id);

    //     // Xóa giá khuyến mãi của các sản phẩm trong sản phẩm cũ
    //     $sanPhamCu = SanPham::where('id', $khuyen_mai->san_pham_id)->first();
    //     $sanPhamCu->gia_khuyen_mai = 0;
    //     $sanPhamCu->save();

    //     $khuyen_mai->update($data);
    //     if($khuyen_mai){
    //         // Lấy tất cả sản phẩm trong sản phẩm mới
    //         $sanPhamMoi = SanPham::where('id', $request->san_pham_id)->first();
    //         // Kiểm tra mức giảm không vượt quá giá bán
    //         if ($request->muc_giam >= $sanPhamMoi->gia_ban) {
    //             $sanPhamMoi->gia_khuyen_mai = $sanPhamCu->gia_khuyen_mai; // giữ nguyên giá trị ban đầu
    //             $sanPhamMoi->save();
    //             return response()->json([
    //                 "update" => 0,
    //                 "message" => "Mức giảm đã lớn hơn giá bán của sản phẩm này!"
    //             ]);
    //         }
    //         // Kiểm tra nếu đang trong thời gian khuyến mãi
    //         if (Carbon::now()->between($khuyen_mai->thoi_gian_bat_dau, $khuyen_mai->thoi_gian_ket_thuc)) {
    //             $sanPhamMoi->gia_khuyen_mai = $sanPhamMoi->gia_ban - $khuyen_mai->muc_giam;
    //         } else {
    //             $sanPhamMoi->gia_khuyen_mai = 0;
    //         }
    //         $sanPhamMoi->save();

    //         // Xóa các đợt khuyến mãi cũ của danh mục này
    //         KhuyenMai::where('san_pham_id', $request->san_pham_id)->where('id', '<>', $khuyen_mai->id)->delete();
    //         return response()->json([
    //             'update' => 1,
    //         ]);
    //     } else {
    //         return response()->json([
    //             'update' => false,
    //         ]);
    //     }
    // }
}
