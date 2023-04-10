<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Auth;

class QuanLyThongTinController extends Controller
{
    public function index()
    {
        $agent = Auth::guard('khach_hang')->user();
        if($agent){
            $data = DonHang::where('agent_id', $agent->id)
                           ->where('tinh_trang', '<>', '-1')
                           ->get();
        } else{
            $data = DonHang::all();
        }
        return view('client.pages.thong_tin_ca_nhan.index', compact('data'));
    }

    public function edit($id)
    {
        $data = KhachHang::find($id);

        if($data){
            return response()->json([
                'edit'      => true,
                'data'      => $data,
            ]);
        } else{
            return response()->json([
                'edit'      => false,
            ]);
        }
    }

    public function update(Request $request)
    {
        $agent = Auth::guard('khach_hang')->user();
        if($agent) {
            $khach_hang = KhachHang::find($agent->id);
            $data     = $request->all();
            $khach_hang->update($data);

            if($khach_hang){
                return response()->json([
                    'update'      => true,
                ]);
            } else{
                return response()->json([
                    'update'      => false,
                ]);
            }
        }
    }
}
