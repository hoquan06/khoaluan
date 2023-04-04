<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;

class TaiKhoanController extends Controller
{
    public function index() 
    {
        $data = KhachHang::all();
        return view('admin.pages.tai_khoan.index',compact('data'));
    }

    public function destroy($id)
    {
        $data = KhachHang::find($id);
        if($data){
            $data->delete();
            return response()->json([
                'xoa'       => true,
            ]);
        } else{
            return response()->json([
                'xoa'       => false,
            ]);
        }
    }

    public function lock($id) 
    {
        $data = KhachHang::find($id);
        if($data) {
            $data->is_lock = !$data->is_lock;
        }
        return response()->json(["status" => true]);
    }
}
