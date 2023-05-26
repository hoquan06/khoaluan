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
                        ->orderByDesc('khuyen_mais.created_at')
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
        // Lấy sản phẩm cần khuyến mãi
        $sanPham = SanPham::where('id', $request->san_pham_id)->first();

        // Kiểm tra mức giảm không vượt quá giá bán
        if ($request->muc_giam >= $sanPham->gia_ban) {
            return response()->json([
                "update" => 0,
                "message" => "Mức giảm đã lớn hơn giá bán của sản phẩm này!"
            ]);
        }

        // Cập nhật thông tin đợt khuyến mãi
        $data = $request->all();
        $khuyenMai = KhuyenMai::find($request->id);
        $khuyenMai->update($data);

        // Cập nhật giá khuyến mãi cho sản phẩm
        if (Carbon::now()->between($khuyenMai->thoi_gian_bat_dau, $khuyenMai->thoi_gian_ket_thuc)) {
            $sanPham->gia_khuyen_mai = $sanPham->gia_ban - $khuyenMai->muc_giam;
        } else {
            $sanPham->gia_khuyen_mai = 0;
        }
        $sanPham->save();
        return response()->json([
            "update" => 1
        ]);
    }
}
