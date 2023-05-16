<?php

namespace App\Http\Controllers;

use App\Models\DanhMucSanPham;
use App\Models\SanPham;
use App\Models\Banner;
use App\Models\DanhGia;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomePageController extends Controller
{
    public function index()
    {
        $menuCha = DanhMucSanPham::where('id_danh_muc_cha', 0)
                                 ->where('tinh_trang', 1)
                                 ->get();
        $menuCon = DanhMucSanPham::where('id_danh_muc_cha', '<>', 0)
                                 ->where('tinh_trang', 1)
                                 ->get();

        $slide = Slide::latest()->first();
        $banner = Banner::latest()->first();

        $ngay = date("Y-m-d");
        // $sql = "SELECT san_phams.* , khuyen_mais.*
        //         FROM san_phams JOIN khuyen_mais on san_phams.id = khuyen_mais.san_pham_id
        //         Where '$ngay' < thoi_gian_ket_thuc and '$ngay' > thoi_gian_bat_dau";
        // $best_seller = DB::select($sql);

        $sp_giam_gia = "SELECT san_phams.* , khuyen_mais.*
                 FROM san_phams JOIN khuyen_mais on san_phams.id = khuyen_mais.san_pham_id
                Where '$ngay' between thoi_gian_bat_dau and thoi_gian_ket_thuc";
        $spGiam = DB::select($sp_giam_gia);

        $sp_moi = SanPham::orderByDesc('created_at')->get()->take(8);
        $sp_hang_dau = SanPham::orderByDesc('gia_ban')->get();

        $sp_thinh_hanh = "SELECT *, (gia_ban > 10000000) FROM `san_phams`";
        $spThinhHanh = DB::select($sp_thinh_hanh);
        return view('client.pages.home', compact('menuCha', 'menuCon','spGiam', 'slide', 'banner', 'sp_moi', 'sp_hang_dau', 'spThinhHanh'));
    }

    public function viewSanPham($id)
    {
        while(strpos($id, 'post')) {
            $viTri = strpos($id, 'post');
            $id = Str::substr($id, $viTri + 4);
        }
        $sanPham = SanPham::find($id);
        if($sanPham){
            $spLienQuan = SanPham::where('id_danh_muc', $sanPham->id_danh_muc)->get();
            return view('client.pages.chi_tiet_san_pham', compact('sanPham', 'spLienQuan'));
        } else{
            return view('client.pages.404');
        }
    }

    public function viewDanhMuc($id)
    {
        while(strpos($id, 'post')) {
            $viTri = strpos($id, 'post');
            $id = Str::substr($id, $viTri + 4);
        }
        $danhMuc = DanhMucSanPham::find($id);
        if($danhMuc){
            // Nếu là danh mục con
            $danhSach   = $danhMuc->id;
            if($danhMuc->id_danh_muc_cha > 0) {
                $sanPham = SanPham::where('tinh_trang', 1)
                                  ->where('id_danh_muc', $danhSach)
                                  ->get();
            } else {
                // Nó là danh mục cha. Tìm toàn bộ danh mục con
                $danhMucCon = DanhMucSanPham::where('tinh_trang', 1)
                                            ->where('id_danh_muc_cha', $danhSach)
                                            ->get();
                foreach($danhMucCon as $key => $value) {
                    $danhSach = $danhSach . ',' . $value->id;
                }
                $sanPham = SanPham::whereIn('id_danh_muc', explode(",", $danhSach))->get();
            }

            return view('client.pages.ds_san_pham', compact('sanPham'));
        }
        return view('client.pages.ds_san_pham');
    }

    public function search(Request $request)
    {
        $data = $request->search;

        $danhSach = SanPham::where('ten_san_pham', 'like', "%". $data ."%")->get();
        return view('client.pages.ds_san_pham_search', compact('danhSach'));
    }

    public function spThinhHanh()
    {
        $sp_thinh_hanh = "SELECT *, (gia_ban > 10000000) FROM `san_phams`";
        $spThinhHanh = DB::select($sp_thinh_hanh);
        return view('client.pages.view_ds_san_pham.thinh_hanh', compact('spThinhHanh'));
    }

    public function spNoiBat()
    {
        $sp_thinh_hanh = "SELECT *, (gia_ban > 10000000) FROM `san_phams`";
        $spThinhHanh = DB::select($sp_thinh_hanh);
        return view('client.pages.view_ds_san_pham.noi_bat', compact('spThinhHanh'));
    }

    public function spHangDau()
    {
        $sp_hang_dau = SanPham::orderByDesc('gia_khuyen_mai')->get();
        return view('client.pages.view_ds_san_pham.hang_dau', compact('sp_hang_dau'));
    }

    public function spGiamGia()
    {
        $sp_giam_gia = "SELECT * FROM `san_phams` WHERE `gia_khuyen_mai` > 0
                        ORDER BY gia_khuyen_mai DESC";
        $spGiam = DB::select($sp_giam_gia);
        return view('client.pages.view_ds_san_pham.giam_gia', compact('spGiam'));
    }
}
