<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use Illuminate\Http\Request;
use App\Models\KhachHang;

class TaiKhoanController extends Controller
{
    public function index()
    {
        $data = KhachHang::all();
        return view('admin.pages.tai_khoan.index',compact('data'));
    }

    // public function destroy($id)
    // {
    //     $data = KhachHang::find($id);
    //     if ($data) {
    //         $check = KhachHang::join('don_hangs', 'khach_hangs.id', 'don_hangs.agent_id')
    //             ->where('tinh_trang', '>', 0)
    //             ->pluck('khach_hangs.id'); // Lấy danh sách id khách hàng trong $check

    //         if ($check->contains($id)) {
    //             $data->delete();
    //             return response()->json([
    //                 'xoa' => true,
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'xoa' => false,
    //             ]);
    //         }
    //     } else {
    //         return response()->json([
    //             'xoa' => false,
    //         ]);
    //     }
    // }
    public function destroy($id)
    {
        $data = KhachHang::find($id);
        if ($data) {
            $check = DonHang::where('agent_id', $id)
                            ->where('tinh_trang', '>', 0)
                            ->exists();
            if ($check) {
                return response()->json([
                    'xoa' => 0,
                    'message' => 'Không thể xóa do khách hàng này đã phát sinh đơn hàng!'
                ]);
            } else{
                $data->delete();
                return response()->json([
                    'xoa' => 1,
                    'message' => 'Xóa khách hàng thành công'
                ]);
            }
        } else {
            return response()->json([
                'xoa' => false,
                'message' => 'Khách hàng không tồn tại'
            ]);
        }
    }


    public function lock($id)
    {
        $data = KhachHang::find($id);
        if($data) {
            $data->is_lock = !$data->is_lock;
            $data->save();
            return response()->json([
                "status" => true,
                "lock" => $data->is_lock,
                ]);
        } else {
            return response()->json(["status" => false]);
        }

    }
}
