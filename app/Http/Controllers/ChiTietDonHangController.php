<?php

namespace App\Http\Controllers;

use App\Http\Requests\GioHangRequest;
use App\Models\ChiTietDonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChiTietDonHangController extends Controller
{
    public function index()
    {
        $agent = Auth::guard('khach_hang')->user();
        if($agent){
            $cart = ChiTietDonHang::join('san_phams', 'chi_tiet_don_hangs.san_pham_id', 'san_phams.id')
                                  ->where('agent_id', $agent->id)
                                  ->where('is_cart', 0)
                                  ->select('chi_tiet_don_hangs.*', 'san_phams.hinh_anh')
                                  ->get();
        } else{
            return view('client.pages.404');
        }
        return view('client.pages.gio_hang.index', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        $agent = Auth::guard('khach_hang')->user();
        if($agent){
            $sanPham = SanPham::find($request->san_pham_id);
            //is_cart = 0 là giỏ hàng, = 1 là đơn hàng
            //Kiểm tra sp trong giỏ hàng
            $chiTietDonHang = ChiTietDonHang::where('san_pham_id', $request->san_pham_id)
                                            ->where('agent_id', $agent->id)
                                            ->where('is_cart', 0)
                                            ->first();
            if($chiTietDonHang){
                $chiTietDonHang->so_luong += $request->so_luong;
                $chiTietDonHang->save();
            } else{
                ChiTietDonHang::create([
                    'san_pham_id'       => $sanPham->id,
                    'ten_san_pham'      => $sanPham->ten_san_pham,
                    'so_luong'          => $request->so_luong,
                    'don_gia'           => $sanPham->gia_khuyen_mai ? $sanPham->gia_khuyen_mai : $sanPham->gia_ban,
                    'is_cart'           => 0,
                    'agent_id'          => $agent->id,
                ]);
            }
            return response()->json([
                'giohang'               => true,
            ]);
        } else{
            return response()->json([
                'giohang'               => false,
            ]);
        }
    }
}
