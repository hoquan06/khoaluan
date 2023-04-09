<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function index()
    {
        $don_hang = DonHang::all();
        return view("admin.pages.don_hang.index",compact('don_hang'));
    }

    public function view()
    {
        return view("admin.pages.don_hang.view");
    }

    public function destroy($id)
    {
        $data = DonHang::find($id);
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
}
