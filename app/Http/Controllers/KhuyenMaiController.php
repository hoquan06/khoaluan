<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhuyenMai;
use App\Models\DanhMucSanPham;
use App\Models\SanPham;

class KhuyenMaiController extends Controller
{
    public function index()
    {

        $menuCha = DanhMucSanPham::where('id_danh_muc_cha', 0)
                                 ->where('tinh_trang', 1)
                                 ->get();
        return view('admin.pages.khuyen_mai.index',compact("menuCha"));
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
                $value->gia_khuyen_mai = $value->gia_ban - $khuyenMai->muc_giam;
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
