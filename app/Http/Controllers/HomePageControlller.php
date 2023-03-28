<?php

namespace App\Http\Controllers;

use App\Models\DanhMucSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // $sql = "SELECT *, (gia_ban - gia_khuyen_mai) / gia_ban * 100 as ty_le_giam FROM `san_phams` ORDER BY ty_le_giam DESC";
        $sql = "SELECT *, (`gia_ban` - `gia_khuyen_mai`) / `gia_ban` * 100 AS `ty_le_giam` FROM `san_phams` ORDER BY ty_le_giam DESC";
        $best_seller = DB::select($sql);
        return view('client.pages.home', compact('menuCha', 'menuCon', 'best_seller'));
    }
}
