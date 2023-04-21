<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    public function thongKeTheoNgay()
    {
        $doanhThu = "SELECT SUM(thuc_tra) as tong_doanh_thu
                     FROM `don_hangs`
                     WHERE tinh_trang = 2";
        $tongDoanhThu = DB::select($doanhThu);

        $ngay = date("Y-m-d");
        $sql = "SELECT SUM(thuc_tra) as doanh_thu
                FROM `don_hangs`
                WHERE created_at LIKE '%$ngay%'
                AND tinh_trang = 2";
        $doanhThuNgay = DB::select($sql);
        return view('admin.pages.doanh_thu.ngay', compact('tongDoanhThu','doanhThuNgay'));
    }

    public function thongKeTheoTuan()
    {
        $doanhThu = "SELECT SUM(thuc_tra) as tong_doanh_thu
                     FROM `don_hangs`
                     WHERE tinh_trang = 2";
        $tongDoanhThu = DB::select($doanhThu);

        $ngay = date("Y-m-d");
        $tuan = date("Y-m-d", strtotime('-1 week'));
        $sql = "SELECT SUM(thuc_tra) as doanh_thu
                FROM `don_hangs`
                WHERE '%$tuan%' >= like created_at <= like '%$ngay%'
                AND tinh_trang = 2";
        $doanhThuTuan = DB::select($sql);
        dd($doanhThuTuan);
        return view('admin.pages.doanh_thu.tuan', compact('tongDoanhThu', 'doanhThuTuan'));
    }

    public function thongKeTheoThang()
    {
        $doanhThu = "SELECT SUM(thuc_tra) as tong_doanh_thu
                     FROM `don_hangs`
                     WHERE tinh_trang = 2";
        $tongDoanhThu = DB::select($doanhThu);
        return view('admin.pages.doanh_thu.thang', compact('tongDoanhThu'));
    }

    public function thongKeTheoNam()
    {
        $doanhThu = "SELECT SUM(thuc_tra) as tong_doanh_thu
                     FROM `don_hangs`
                     WHERE tinh_trang = 2";
        $tongDoanhThu = DB::select($doanhThu);
        return view('admin.pages.doanh_thu.nam', compact('tongDoanhThu'));
    }
}
