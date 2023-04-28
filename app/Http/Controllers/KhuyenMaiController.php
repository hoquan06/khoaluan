<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhuyenMai;
use App\Models\DanhMucSanPham;
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

    public function store(Request $request)
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

}
