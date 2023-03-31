<?php

namespace App\Http\Controllers;

use App\Models\DanhMucSanPham;
use App\Models\SanPham;
use App\Models\Banner;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomePageControlller extends Controller
{
    public function index()
    {
        $menuCha = DanhMucSanPham::where('id_danh_muc_cha', 0)
                                 ->where('tinh_trang', 1)
                                 ->get();
        $menuCon = DanhMucSanPham::where('id_danh_muc_cha', '<>', 0)
                                 ->where('tinh_trang', 1)
                                 ->get();

        // $slide = Slide::latest()->first();
        // $banner = Banner::latest()->first();
        // $sql = "SELECT *, (gia_ban - gia_khuyen_mai) / gia_ban * 100 as ty_le_giam FROM `san_phams` ORDER BY ty_le_giam DESC";
        $sql = "SELECT *, (`gia_ban` - `gia_khuyen_mai`) / `gia_ban` * 100 AS `ty_le_giam` FROM `san_phams` ORDER BY ty_le_giam DESC";
        $best_seller = DB::select($sql);
        return view('client.pages.home', compact('menuCha', 'menuCon', 'best_seller','slide','banner'));
    }

    public function viewSanPham($id)
    {
        while(strpos($id, 'post')) {
            $viTri = strpos($id, 'post');
            $id = Str::substr($id, $viTri + 4);
        }
        $sanPham = SanPham::find($id);
        if($sanPham){
            return view('client.pages.chi_tiet_san_pham', compact('sanPham'));
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
            if($danhMuc->id_danh_muc_cha > 0) {
                $sanPham = SanPham::where('tinh_trang', 1)
                                  ->where('id_danh_muc', $danhMuc->id)
                                  ->get();
            } else {
                // Nó là danh mục cha. Tìm toàn bộ danh mục con
                // $danhSach   = $danhMuc->id;
                // $danhMucCon = DanhMucSanPham::where('id_danh_muc_cha', $danhSach)
                //                             ->get();
                // foreach($danhMucCon as $key => $value) {
                //     $danhSach = $danhSach . ',' . $value->id;
                // }
                // $sanPham = SanPham::whereIn('id_danh_muc', explode(",", $danhSach))->get();
            }

            return view('client.pages.ds_san_pham', compact('sanPham'));
        }
        return view('client.pages.ds_san_pham');
    }

    public function search(Request $request)
    {
        $data = $request->search;

        $danhSach = SanPham::where('ten_san_pham', 'like', "%" .$data. "%")->get();
        return view('client.pages.ds_san_pham_search', compact('danhSach'));
    }
}
