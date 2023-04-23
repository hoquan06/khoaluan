<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    public function thongKeTheoNgay()
    {
        //Tổng doanh thu
        $doanhThu = "SELECT SUM(thuc_tra) as tong_doanh_thu
                     FROM `don_hangs`
                     WHERE tinh_trang = 2";
        $tongDoanhThu = DB::select($doanhThu);

        //Doanh thu ngày hôm nay và số lượng khách hàng mua
        $ngay = date("Y-m-d");
        $sql = "SELECT SUM(thuc_tra) as doanh_thu, COUNT(DISTINCT don_hangs.agent_id) as sl_kh
                FROM don_hangs
                WHERE don_hangs.created_at LIKE '%$ngay%'
                AND tinh_trang = 2";
        $doanhThuNgay = DB::select($sql);

        //Doanh thu ngày hôm qua
        $ngayhq = date("Y-m-d", strtotime("yesterday"));
        $sql1 = "SELECT SUM(thuc_tra) as doanh_thu
                FROM don_hangs
                WHERE don_hangs.created_at LIKE '%$ngayhq%'
                AND tinh_trang = 2";
        $doanhThuNgayHQ = DB::select($sql1);

        //Số lượng sp bán được
        $sl_sp = "SELECT COUNT(DISTINCT san_pham_id) as sl_sp
                    FROM chi_tiet_don_hangs JOIN don_hangs ON don_hangs.id = chi_tiet_don_hangs.don_hang_id
                    WHERE chi_tiet_don_hangs.created_at LIKE '%$ngay%'
                    AND tinh_trang = 2";
        $slSanPham = DB::select($sl_sp);

        return view('admin.pages.doanh_thu.ngay', compact('tongDoanhThu','doanhThuNgay', 'slSanPham', 'doanhThuNgayHQ'));
    }

    public function thongKeTheoTuan()
    {
        // Tổng doanh thu
        $doanhThu = "SELECT SUM(thuc_tra) as tong_doanh_thu
                     FROM `don_hangs`
                     WHERE tinh_trang = 2";
        $tongDoanhThu = DB::select($doanhThu);

        //Doanh thu tuần này và số lượng khách hàng mua
        $start = date('Y-m-d',strtotime("Monday This Week"));
        $end = date('Y-m-d',strtotime("Monday Next Week"));
        // >= và <
        $sql = "SELECT SUM(thuc_tra) as doanh_thu, COUNT(DISTINCT don_hangs.agent_id) as sl_kh
                FROM `don_hangs`
                WHERE  created_at between '$start' AND '$end'
                AND tinh_trang = 2";
        $doanhThuTuan = DB::select($sql);

        //Doanh thu tuần trước
        $startLastWeek = date('Y-m-d',strtotime("Monday Last Week"));
        $endLastWeek = date('Y-m-d',strtotime("Monday This Week"));
        // >= và <
        $sql1 = "SELECT SUM(thuc_tra) as doanh_thu
                FROM `don_hangs`
                WHERE  created_at between '$startLastWeek' AND '$endLastWeek'
                AND tinh_trang = 2";
        $doanhThuTuanTruoc = DB::select($sql1);

        //Số lượng sp bán được
        $sl_sp = "SELECT COUNT(DISTINCT san_pham_id) as sl_sp
                    FROM chi_tiet_don_hangs JOIN don_hangs ON don_hangs.id = chi_tiet_don_hangs.don_hang_id
                    WHERE chi_tiet_don_hangs.created_at between '$start' AND '$end'
                    AND tinh_trang = 2";
        $slSanPham = DB::select($sl_sp);

        return view('admin.pages.doanh_thu.tuan', compact('tongDoanhThu', 'doanhThuTuan', 'doanhThuTuanTruoc', 'slSanPham'));
    }

    public function thongKeTheoThang()
    {
        //Tổng doanh thu
        $doanhThu = "SELECT SUM(thuc_tra) as tong_doanh_thu
                     FROM `don_hangs`
                     WHERE tinh_trang = 2";
        $tongDoanhThu = DB::select($doanhThu);

        //Doanh thu tháng này và số lượng khách hàng mua
        $start =  date("Y-m-d", strtotime("first day of this month"));
        $end =  date("Y-m-d",strtotime("first day of next month"));
        // >= và <
        $sql = "SELECT SUM(thuc_tra) as doanh_thu, COUNT(DISTINCT don_hangs.agent_id) as sl_kh
                FROM `don_hangs`
                WHERE  created_at between '$start' AND '$end'
                AND tinh_trang = 2";
        $doanhThuThang = DB::select($sql);

        //Doanh thu tháng trước
        $startLastMonth =  date("Y-m-d", strtotime("first day of last month"));
        $endLastMonth =  date("Y-m-d",strtotime("first day of this month"));
        // >= và <
        $sql1 = "SELECT SUM(thuc_tra) as doanh_thu
                 FROM `don_hangs`
                 WHERE  created_at between '$startLastMonth' AND '$endLastMonth'
                 AND tinh_trang = 2";
        $doanhThuThangTruoc = DB::select($sql1);

         //Số lượng sp bán được
        $sl_sp = "SELECT COUNT(DISTINCT san_pham_id) as sl_sp
                  FROM chi_tiet_don_hangs JOIN don_hangs ON don_hangs.id = chi_tiet_don_hangs.don_hang_id
                  WHERE chi_tiet_don_hangs.created_at between '$start' AND '$end'
                  AND tinh_trang = 2";
        $slSanPham = DB::select($sl_sp);
        return view('admin.pages.doanh_thu.thang', compact('tongDoanhThu', 'doanhThuThang', 'doanhThuThangTruoc', 'slSanPham'));
    }

    public function thongKeTheoNam()
    {
        //Tổng doanh thu
        $doanhThu = "SELECT SUM(thuc_tra) as tong_doanh_thu
                     FROM `don_hangs`
                     WHERE tinh_trang = 2";
        $tongDoanhThu = DB::select($doanhThu);

        //Doanh thu năm này và số lượng khách hàng mua
        $year = date("Y");
        $sql = "SELECT SUM(thuc_tra) as doanh_thu, COUNT(DISTINCT don_hangs.agent_id) as sl_kh
                FROM don_hangs
                WHERE don_hangs.created_at LIKE '%$year%'
                AND tinh_trang = 2";
        $doanhThuNam = DB::select($sql);

        //Doanh thu năm trước
        $lastYear = date("Y",strtotime("-1 year"));
        $sql1 = "SELECT SUM(thuc_tra) as doanh_thu
                 FROM don_hangs
                 WHERE don_hangs.created_at LIKE '%$lastYear%'
                 AND tinh_trang = 2";
        $doanhThuNamTruoc = DB::select($sql1);

         //Số lượng sp bán được
         $sl_sp = "SELECT COUNT(DISTINCT san_pham_id) as sl_sp
                   FROM chi_tiet_don_hangs JOIN don_hangs ON don_hangs.id = chi_tiet_don_hangs.don_hang_id
                   WHERE chi_tiet_don_hangs.created_at LIKE '%$year%'
                   AND tinh_trang = 2";
        $slSanPham = DB::select($sl_sp);
        return view('admin.pages.doanh_thu.nam', compact('tongDoanhThu', 'doanhThuNam', 'doanhThuNamTruoc', 'slSanPham'));
    }
}
