<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhGiaRequest;
use App\Models\DanhGia;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DanhGiaController extends Controller
{
    public function index()
    {
        return view('client.pages.chi_tiet_san_pham');
    }

    public function store(DanhGiaRequest $request)
    {
        $agent = Auth::guard('khach_hang')->user();
        if ($agent) {
            // Đã đăng nhập
            $sql = "SELECT khach_hangs.*
                    FROM khach_hangs
                    WHERE khach_hangs.id = {$agent->id} AND EXISTS (
                                SELECT don_hangs.*
                                FROM don_hangs
                                INNER JOIN chi_tiet_don_hangs ON don_hangs.id = chi_tiet_don_hangs.don_hang_id
                                WHERE chi_tiet_don_hangs.san_pham_id = {$request->san_pham_id} AND don_hangs.tinh_trang = 2 AND don_hangs.agent_id = khach_hangs.id
                                )";
            $danhGia = DB::select($sql);

            if ($danhGia) {
                $sanPham = SanPham::find($request->san_pham_id);
                DanhGia::create([
                    'san_pham_id'   => $sanPham->id,
                    'agent_id'      => $agent->id,
                    'noi_dung'      => $request->noi_dung,
                    'so_sao'        => $request->so_sao,
                ]);
                return response()->json([
                    'themDanhGia'       => 1,
                ]);
            } else {
                return response()->json([
                    'themDanhGia'       => 2,
                ]);
            }
        } else {
            // Chưa đăng nhập
            return response()->json([
                'themDanhGia'       => 3,
            ]);
        }
    }

    public function dsDanhGia($id)
    {
            $dsDanhGia = DanhGia::join('khach_hangs','khach_hangs.id','danh_gias.agent_id')
                                ->join('san_phams','san_phams.id','danh_gias.san_pham_id')
                                ->select('san_phams.ten_san_pham','danh_gias.so_sao','danh_gias.noi_dung','khach_hangs.ho_va_ten')
                                ->get();
        return view("admin.pages.danh_gia.index",compact('dsDanhGia'));
    }

    public function getData($id)
    {
        $danhGia = DanhGia::join('khach_hangs', 'khach_hangs.id', 'danh_gias.agent_id')
                          ->where('san_pham_id', $id)
                          ->get();
        return response()->json([
            'list'      => $danhGia,
        ]);
    }
    public function thongKe()
    {
        return view("admin.pages.danh_gia.view");
    }
}
