<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\SanPham;
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

        return view('admin.pages.thong_ke.doanh_thu.ngay', compact('tongDoanhThu','doanhThuNgay', 'slSanPham', 'doanhThuNgayHQ'));
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

        return view('admin.pages.thong_ke.doanh_thu.tuan', compact('tongDoanhThu', 'doanhThuTuan', 'doanhThuTuanTruoc', 'slSanPham'));
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
        return view('admin.pages.thong_ke.doanh_thu.thang', compact('tongDoanhThu', 'doanhThuThang', 'doanhThuThangTruoc', 'slSanPham'));
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
        return view('admin.pages.thong_ke.doanh_thu.nam', compact('tongDoanhThu', 'doanhThuNam', 'doanhThuNamTruoc', 'slSanPham'));
    }

    public function spBanChay()
    {
        $sql = "SELECT chi_tiet_don_hangs.ten_san_pham, san_phams.gia_ban, san_phams.gia_khuyen_mai, san_phams.hinh_anh, SUM(chi_tiet_don_hangs.so_luong) as luotban
                FROM chi_tiet_don_hangs JOIN san_phams on san_phams.id = chi_tiet_don_hangs.san_pham_id JOIN don_hangs on chi_tiet_don_hangs.don_hang_id = don_hangs.id
                WHERE don_hangs.tinh_trang = '2'
                GROUP BY chi_tiet_don_hangs.ten_san_pham, san_phams.gia_ban, san_phams.gia_khuyen_mai, san_phams.hinh_anh
                ORDER BY luotban DESC
                LIMIT 5";
        $spBanChay = DB::select($sql);
        return view('admin.pages.thong_ke.sp_ban_chay.index', compact('spBanChay'));
    }

    public function spChuaCoLuotMua()
    {
        $sql = "SELECT san_phams.*
        FROM `san_phams`
        WHERE NOT EXISTS (SELECT chi_tiet_don_hangs.*, san_phams.*
                          FROM chi_tiet_don_hangs JOIN don_hangs ON don_hangs.id = chi_tiet_don_hangs.don_hang_id
                          WHERE san_phams.id = chi_tiet_don_hangs.san_pham_id AND tinh_trang = 2)";
        $spChuaBanDuoc = DB::select($sql);
        return view('admin.pages.thong_ke.san_pham_chua_co_luot_mua.index', compact('spChuaBanDuoc'));
    }

    public function khachHangMuaNhieu()
    {
        $sql = "SELECT khach_hangs.ho_va_ten, khach_hangs.ngay_sinh, khach_hangs.so_dien_thoai, khach_hangs.dia_chi, COUNT(don_hangs.agent_id) as soDon, SUM(thuc_tra) as tongTien
                FROM khach_hangs JOIN don_hangs ON khach_hangs.id = don_hangs.agent_id
                WHERE tinh_trang = 2
                GROUP BY khach_hangs.ho_va_ten, khach_hangs.ngay_sinh, khach_hangs.so_dien_thoai, khach_hangs.dia_chi
                ORDER BY soDon DESC";
        $khachHang = DB::select($sql);
        return view('admin.pages.thong_ke.khach_hang.index', compact('khachHang'));
    }

    public function tinhTrang($id)
   {
        $data = SanPham::find($id);
        if($data){
            $data->tinh_trang = !$data->tinh_trang;
            $data->save();
            return response()->json([
                'doitrangthai'      => true,
                'tinhtrang'         => $data->tinh_trang,
            ]);
        }else{
            return response()->json([
                'doitrangthai'      => false,
            ]);
        }
    }
}
