<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DonHangController extends Controller
{
    public function index()
    {
        $don_hang = DonHang::all();
        return view("admin.pages.don_hang.index",compact('don_hang'));
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

    public function createDonHang()
    {
        $agent = Auth::guard('khach_hang')->user();
        if($agent){
            //1. Lấy thông tin giỏ hàng
            $gioHang = ChiTietDonHang::where('agent_id', $agent->id)
                                     ->where('is_cart', 0)
                                     ->get();
            if(empty($gioHang) || count($gioHang) > 0){
                //2.Tạo đơn hàng
                $donHang = DonHang::create([
                    'ma_don_hang'           => Str::uuid(),
                    'tong_tien'             => 0,
                    'tien_giam_gia'         => 0,
                    'thuc_tra'              => 0,
                    'agent_id'              => $agent->id,
                    'loai_thanh_toan'       => 0, //=1 là banking
                    'dia_chi_giao_hang'     => $agent->dia_chi,
                ]);
                //3. Chuyển giỏ hàng thành đơn hàng
                $tong_tien = 0;
                $thuc_tra  = 0;
                foreach($gioHang as $key => $value){
                    $sanPham = SanPham::find($value->san_pham_id);
                    if($sanPham){
                        $giaBan     = $sanPham->gia_khuyen_mai ? $sanPham->gia_khuyen_mai : $sanPham->gia_ban;
                        $tong_tien += $value->so_luong * $sanPham->gia_ban;
                        $thuc_tra  += $value->so_luong * $giaBan;

                        // $sanPham->so_luong -= $value->so_luong;
                        $value->is_cart = 1;
                        $value->don_hang_id = $donHang->id;
                        $value->save();
                        $sanPham->save();
                    } else{
                        $value->delete();
                    }
                }
                //Tính tổng tiền và thực trả
                $donHang->tong_tien = $tong_tien;
                $donHang->tien_giam_gia = $tong_tien - $thuc_tra;
                $donHang->thuc_tra = $thuc_tra;
                $donHang->save();

                return response()->json([
                    'donhang'       => 1,
                ]);
            } else{
                return response()->json([
                    'donhang'       => 2,
                ]);
            }
        } else{
            return response()->json([
                'donhang'       => 3,
            ]);
        }
    }
}
