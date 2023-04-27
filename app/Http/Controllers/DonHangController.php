<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DonHangController extends Controller
{
    public function index()
    {
        $donHang = DonHang::join('khach_hangs','khach_hangs.id','don_hangs.agent_id')
                          ->select('khach_hangs.*','don_hangs.*')
                          ->get();
        return view("admin.pages.don_hang.index",compact('donHang'));
    }

    public function accept($id)
    {
        $data = DonHang::find($id);

        if($data->tinh_trang == 0){
            $data->tinh_trang = !$data->tinh_trang;
            $data->save();
            return response()->json([
                'doitrangthai'      => 1,
                'tinhtrang'         => $data->tinh_trang,
            ]);
        } else if($data->tinh_trang == -1){
            return response()->json([
                'doitrangthai'      => 2,
            ]);
        }else if($data->tinh_trang == 2){
            return response()->json([
                'doitrangthai'      => 3,
            ]);
        } else{
            return response()->json([
                'doitrangthai'      => 4,
            ]);
        }
    }

    public function view($id)
    {
        $chi_tiet_don_hang = DonHang::join('chi_tiet_don_hangs','don_hangs.id','chi_tiet_don_hangs.don_hang_id')
                            ->join('san_phams','san_phams.id','chi_tiet_don_hangs.san_pham_id')
                            ->join('khach_hangs','khach_hangs.id','don_hangs.agent_id')
                            ->select('don_hangs.*','khach_hangs.*','chi_tiet_don_hangs.ten_san_pham','chi_tiet_don_hangs.so_luong','chi_tiet_don_hangs.don_gia','san_phams.hinh_anh','san_phams.gia_ban','san_phams.gia_khuyen_mai')
                            ->where('don_hang_id', $id)
                            ->get();

        return view("admin.pages.don_hang.view",compact('chi_tiet_don_hang'));
    }

    // public function watch($id)
    // {
    //     $don_hang_kha_dung = DonHang::join('khach_hangs','khach_hangs.id','don_hangs.agent_id')
    //     ->select('don_hangs.*')
    //     ->where('agent_id', $id)
    //     ->get();
    //     dd($don_hang_kha_dung);
    //     return view("client.pages.thong_tin_ca_nhan.index",compact('don_hang_kha_dung'));
    // }

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
                    'loai_thanh_toan'       => 0, //=1 là banking , 0 thanh toán khi nhận hàng
                    'dia_chi_giao_hang'     => $agent->dia_chi,
                ]);
                //3. Chuyển giỏ hàng thành đơn hàng
                $tong_tien = 0;
                $thuc_tra  = 0;
                foreach($gioHang as $key => $value){
                    $sanPham = SanPham::find($value->san_pham_id);
                    if($sanPham){
                        $giaBan     = $sanPham->gia_khuyen_mai ? $sanPham->gia_khuyen_mai : $sanPham->gia_ban; //
                        $tong_tien += $value->so_luong * $sanPham->gia_ban; // số lượng * giá bán gốc
                        $thuc_tra  += $value->so_luong * $giaBan;  // số lượng * giá khuyến mãi

                        // nếu ko có khuyến mãi thì tổng tiền = thực trả
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

    public function getData()
    {
        $agent = Auth::guard('khach_hang')->user();
        if($agent){
            //đơn khả dụng
            $data = DonHang::where('agent_id', $agent->id)
                           ->where('tinh_trang', '<>', '-1')
                           ->get();
            //đơn hủy
            $donHuy = DonHang::where('agent_id', $agent->id)
                             ->where('tinh_trang', -1)
                             ->get();
            return response()->json([
                'donhang'       => $data,
                'donhuy'        => $donHuy,
            ]);
        }
    }

    public function viewOrder($id)
    {
        $agent = Auth::guard('khach_hang')->user();
        if($agent){
            $data = ChiTietDonHang::join('san_phams', 'chi_tiet_don_hangs.san_pham_id', 'san_phams.id')
                                  ->where('agent_id', $agent->id)
                                  ->where('don_hang_id', $id)
                                  ->select('chi_tiet_don_hangs.*', 'san_phams.hinh_anh', 'san_phams.slug_san_pham')
                                  ->get();
            $tongTien = DonHang::where('agent_id', $agent->id)
                               ->where('id', $id)
                               ->get();
            return view('client.pages.chi_tiet_don_hang.index', compact('data', 'tongTien'));
        }
    }

    public function cancelOrder($id)
    {
        $agent = Auth::guard('khach_hang')->user();
        if($agent){
            $donHang = DonHang::find($id);
            if($donHang){
                if($donHang->tinh_trang == 0){
                    $donHang->tinh_trang = -1;
                    $donHang->save();
                    return response()->json([
                        'huy'       => 1,
                    ]);
                } else{
                    return response()->json([
                        'huy'       => 2,
                    ]);
                }
            } else{
                return response()->json([
                    'huy'       => 3,
                ]);
            }
        }
    }

    public function orderCompleted($id)
    {
        $agent = Auth::guard('khach_hang')->user();
        if($agent){
            $donHang = DonHang::find($id);
            if($donHang){
                $donHang->tinh_trang = 2;
                $donHang->save();
                return response()->json([
                    'nhanHang'      => true,
                ]);
            } else{
                return response()->json([
                    'nhanHang'      => false,
                ]);
            }
        }
    }
}
