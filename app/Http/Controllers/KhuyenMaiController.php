<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhuyenMai;
use App\Models\DanhMucSanPham;

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
        $sanPham = SanPham::find($request->danh_muc_id);    
        dd($sanPham);
        $data = $request->all();
        KhuyenMai::create($data);
        return response()->json(["status" => true]);
    }

}
