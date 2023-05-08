<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhuyenMai;
use App\Models\DanhMucSanPham;
use App\Http\Requests\KhuyenMaiRequest;
use App\Models\SanPham;
use Carbon\Carbon;

class KhuyenMaiController extends Controller
{
    public function index()
    {

        $menuCha = DanhMucSanPham::where('id_danh_muc_cha', 0)
                                 ->where('tinh_trang', 1)
                                 ->get();

        $dsKhuyenMai = KhuyenMai::join('danh_muc_san_phams','danh_muc_san_phams.id','khuyen_mais.danh_muc_id')
                                ->select('khuyen_mais.*','danh_muc_san_phams.ten_danh_muc')
                                ->get();
        return view('admin.pages.khuyen_mai.index',compact("menuCha","dsKhuyenMai"));
    }

    public function store(KhuyenMaiRequest $request)
    {
        // Lấy tất cả sản phẩm trong danh mục cần khuyến mãi
        $sanPham = SanPham::where('id_danh_muc', $request->danh_muc_id)->get();

        if ($sanPham->count() > 0) {
            // Tạo mới đợt khuyến mãi
            $data = $request->all();
            $khuyenMai = KhuyenMai::create($data);

            // Lặp qua từng sản phẩm và cập nhật giá khuyến mãi
            foreach ($sanPham as $value) {
                // Kiểm tra nếu đang trong thời gian khuyến mãi
                if (Carbon::now()->between($khuyenMai->thoi_gian_bat_dau, $khuyenMai->thoi_gian_ket_thuc)) {
                    $value->gia_khuyen_mai = $value->gia_ban - $khuyenMai->muc_giam;
                } else {
                    $value->gia_khuyen_mai = 0;
                }
                $value->save();
            }

            // Xóa các đợt khuyến mãi cũ của danh mục này
            KhuyenMai::where('danh_muc_id', $request->danh_muc_id)->where('id', '<>', $khuyenMai->id)->delete();

            return response()->json(["status" => true]);
        } else {
            return response()->json(["status" => false]);
        }
    }

    public function delete($id)
    {
        $khuyenMai = KhuyenMai::find($id);
        if($khuyenMai){
            $khuyenMai->delete();

            // Cập nhật giá sản phẩm nếu đợt khuyến mãi đã bị xóa hoặc hết hạn
            $sanPham = SanPham::where('id_danh_muc', $khuyenMai->danh_muc_id)->get();
            foreach ($sanPham as $value) {
                if ($value->gia_khuyen_mai != 0 && $value->gia_khuyen_mai == $value->gia_ban - $khuyenMai->muc_giam) {
                    $value->gia_khuyen_mai = 0;
                    $value->save();
                }
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
        $data = KhuyenMai::join('danh_muc_san_phams','khuyen_mais.danh_muc_id','danh_muc_san_phams.id')
                        ->select("khuyen_mais.*", 'danh_muc_san_phams.ten_danh_muc')
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

    // public function update(Request $request)
    // {
    //     $data     = $request->all();
    //     $khuyen_mai = KhuyenMai::find($request->id);
    //     $khuyen_mai->update($data);
    //     if($khuyen_mai){
    //         return response()->json([
    //             'update'      => true,
    //         ]);
    //     } else{
    //         return response()->json([
    //             'update'      => false,
    //         ]);
    //     }
    // }
    public function update(Request $request)
    {
        $data = $request->all();
        $khuyen_mai = KhuyenMai::find($request->id);

        // Xóa giá khuyến mãi của các sản phẩm trong danh mục cũ
        $sanPhamCu = SanPham::where('id_danh_muc', $khuyen_mai->danh_muc_id)->get();
        foreach ($sanPhamCu as $value) {
            $value->gia_khuyen_mai = 0;
            $value->save();
        }

        $khuyen_mai->update($data);
        if($khuyen_mai){
            // Lấy tất cả sản phẩm trong danh mục mới
            $sanPhamMoi = SanPham::where('id_danh_muc', $request->danh_muc_id)->get();

            // Lặp qua từng sản phẩm và cập nhật giá khuyến mãi
            foreach ($sanPhamMoi as $value) {
                // Kiểm tra nếu đang trong thời gian khuyến mãi
                if (Carbon::now()->between($khuyen_mai->thoi_gian_bat_dau, $khuyen_mai->thoi_gian_ket_thuc)) {
                    $value->gia_khuyen_mai = $value->gia_ban - $khuyen_mai->muc_giam;
                } else {
                    $value->gia_khuyen_mai = 0;
                }
                $value->save();
            }

            // Xóa các đợt khuyến mãi cũ của danh mục này
            KhuyenMai::where('danh_muc_id', $request->danh_muc_id)->where('id', '<>', $khuyen_mai->id)->delete();

            return response()->json([
                'update' => true,
            ]);
        } else {
            return response()->json([
                'update' => false,
            ]);
        }
    }


}
