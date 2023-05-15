<?php

use App\Http\Controllers\DonHangController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('admin')->group(function () {
    Route::prefix('danh-muc-san-pham')->group(function () {
        Route::get('/index', [\App\Http\Controllers\DanhMucSanPhamController::class, 'index']);
        Route::post('/index', [\App\Http\Controllers\DanhMucSanPhamController::class, 'store']);
        Route::get('/doi-trang-thai/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'doiTrangThai']);
        Route::get('/delete/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'destroy']);
        Route::get('/edit/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\DanhMucSanPhamController::class, 'update']);
        Route::get('/data', [\App\Http\Controllers\DanhMucSanPhamController::class, 'getData']);
    });

    Route::prefix('san-pham')->group(function () {
        Route::get('/index', [\App\Http\Controllers\SanPhamController::class, 'index']);
        Route::post('/index', [\App\Http\Controllers\SanPhamController::class, 'store']);
        Route::get('/data', [\App\Http\Controllers\SanPhamController::class, 'getData']);
        Route::get('/doi-trang-thai/{id}', [\App\Http\Controllers\SanPhamController:: class, 'doiTrangThai']);
        Route::get('/delete/{id}', [\App\Http\Controllers\SanPhamController::class, 'destroy']);
        Route::get('/edit/{id}', [\App\Http\Controllers\SanPhamController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\SanPhamController::class, 'update']);

        // Route::post('/data-search', [\App\Http\Controllers\SanPhamController::class, 'getDataSearch']);
        // Route::post('/search', [\App\Http\Controllers\SanPhamController::class, 'search']);
    });

    Route::prefix('banner')->group(function () {
        Route::get('/index', [\App\Http\Controllers\BannerController::class, 'index']);
        Route::post('/index', [\App\Http\Controllers\BannerController::class, 'store']);
    });

    Route::prefix('slide')->group(function () {
        Route::get('/index', [\App\Http\Controllers\SlideController::class, 'index']);
        Route::post('/index', [\App\Http\Controllers\SlideController::class, 'store']);
    });

    Route::prefix('khuyen-mai')->group(function () {
        Route::get('/index', [\App\Http\Controllers\KhuyenMaiController::class, 'index']);
        Route::post('/index', [\App\Http\Controllers\KhuyenMaiController::class, 'store']);
        Route::get('/san-pham-khuyen-mai/{id}', [\App\Http\Controllers\KhuyenMaiController::class, 'sanPhamKhuyenMai']);
        Route::get('/delete/{id}', [\App\Http\Controllers\KhuyenMaiController::class, 'delete']);
        Route::get('/data', [\App\Http\Controllers\KhuyenMaiController::class, 'getData']);
        Route::get('/edit/{id}', [\App\Http\Controllers\KhuyenMaiController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\KhuyenMaiController::class, 'update']);
    });

    Route::prefix('tai-khoan')->group(function () {
        Route::get('/index', [\App\Http\Controllers\TaiKhoanController::class, 'index']);
        Route::get('/delete/{id}', [\App\Http\Controllers\TaiKhoanController::class, 'destroy']);
        Route::get('/lock/{id}', [\App\Http\Controllers\TaiKhoanController::class, 'lock']);
    });

    Route::prefix('don-hang')->group(function () {
        Route::get('/da-huy/index', [\App\Http\Controllers\DonHangController::class, 'donHangDaHuy']); // tinh trang -1
        Route::get('/da-huy/data', [\App\Http\Controllers\DonHangController::class, 'getDataHuy']);

        Route::get('/cho-duyet/index', [\App\Http\Controllers\DonHangController::class, 'donHangChoDuyet']);// tinh trang 0
        Route::get('/cho-duyet/getDataChoDuyet', [\App\Http\Controllers\DonHangController::class, 'getDataChoDuyet']);

        Route::get('/dang-giao/index', [\App\Http\Controllers\DonHangController::class, 'donHangDangGiao']); // tinh trang 1
        Route::get('/cho-duyet/getDataDangGiao', [\App\Http\Controllers\DonHangController::class, 'getDataDangGiao']);

        Route::get('/da-giao/index', [\App\Http\Controllers\DonHangController::class, 'donHangDaGiao']); // tinh trang 2
        Route::get('/da-giao/data', [\App\Http\Controllers\DonHangController::class, 'getDataDaGiao']);

        Route::get('/that-bai/index', [\App\Http\Controllers\DonHangController::class, 'donThatBai']); // tinh trang 3
        Route::get('/that-bai/getDataGiaoThatBai', [\App\Http\Controllers\DonHangController::class, 'getDataGiaoThatBai']);

        Route::get('/delete/{id}', [\App\Http\Controllers\DonHangController::class, 'destroy']);
        Route::get('/view/{id}', [\App\Http\Controllers\DonHangController::class, 'view']);
        Route::get('/accept/{id} ', [\App\Http\Controllers\DonHangController::class, 'accept']);
        Route::get('/that-bai/{id}', [\App\Http\Controllers\DonHangController::class, 'giaoThatBai']); // tinh trang 3
    });

    Route::prefix('giao-dich')->group(function () {
        Route::get('/index', [\App\Http\Controllers\GiaoDichController::class, 'index']);
    });

    Route::get('/danh-gia/{id}', [\App\Http\Controllers\DanhGiaController::class, 'dsDanhGia']);

    Route::get('/thong-ke-danh-gia', [\App\Http\Controllers\DanhGiaController::class, 'thongKe']);

    Route::get('/thong-ke-danh-gia/2', [\App\Http\Controllers\DanhGiaController::class, 'thongKe2']);

    // Route::get('/thong-ke-danh-gia/doi-trang-thai/{id}', [\App\Http\Controllers\DanhGiaController::class, 'doiTrangThai']);

    Route::prefix('thong-ke')->group(function () {
        Route::prefix('doanh-thu')->group(function () {
            Route::get('/ngay', [\App\Http\Controllers\ThongKeController::class, 'thongKeTheoNgay']);
            Route::get('/tuan', [\App\Http\Controllers\ThongKeController::class, 'thongKeTheoTuan']);
            Route::get('/thang', [\App\Http\Controllers\ThongKeController::class, 'thongKeTheoThang']);
            Route::get('/nam', [\App\Http\Controllers\ThongKeController::class, 'thongKeTheoNam']);
        });
        Route::get('/khach-hang-mua-nhieu', [\App\Http\Controllers\ThongKeController::class, 'khachHangMuaNhieu']);
        Route::get('/san-pham-ban-chay', [\App\Http\Controllers\ThongKeController::class, 'spBanChay']);
        Route::get('/san-pham-chua-co-luot-mua', [\App\Http\Controllers\ThongKeController::class, 'spChuaCoLuotMua']);
        Route::get('/thay-doi-tinh-trang/{id}', [\App\Http\Controllers\ThongKeController::class, 'tinhTrang']);
    });
});

Route::prefix('khach-hang')->group(function () {
    Route::get('/register', [\App\Http\Controllers\KhachHangController::class, 'register']);
    Route::post('/register', [\App\Http\Controllers\KhachHangController::class, 'registerAction']);
    Route::get('/login', [\App\Http\Controllers\KhachHangController::class, 'login']);
    Route::post('/login', [\App\Http\Controllers\KhachHangController::class, 'loginAction']);
    Route::get('/active/{hash}', [\App\Http\Controllers\KhachHangController::class, 'active']);
    Route::get('/logout', [\App\Http\Controllers\KhachHangController::class, 'logout']);
    Route::post('/thay-doi-mat-khau', [\App\Http\Controllers\KhachHangController::class, 'changePassword']);

    Route::get('/quen-mat-khau', [\App\Http\Controllers\KhachHangController::class, 'resetPassword']);
    Route::post('/quen-mat-khau', [\App\Http\Controllers\KhachHangController::class, 'actionResetPassword']);
    Route::get('/cap-nhat-mat-khau/{hash_reset}', [\App\Http\Controllers\KhachHangController::class, 'UpdatePassword']);
    Route::post('/cap-nhat-mat-khau', [\App\Http\Controllers\KhachHangController::class, 'actionUpdatePassword']);

    Route::get('/gio-hang', [\App\Http\Controllers\ChiTietDonHangController::class, 'index']);
    Route::post('/gio-hang', [\App\Http\Controllers\ChiTietDonHangController::class, 'addToCart']);
    Route::get('/gio-hang/data', [\App\Http\Controllers\ChiTietDonHangController::class, 'dataCart']);
    Route::post('/gio-hang/update', [\App\Http\Controllers\ChiTietDonHangController::class, 'cartUpdate']);
    Route::get('/gio-hang/delete/{id}', [\App\Http\Controllers\ChiTietDonHangController::class, 'cartDelete']);
    // Route::post('/gio-hang/delete', [\App\Http\Controllers\ChiTietDonHangController::class, 'cartDelete']);

    Route::get('/yeu-thich', [\App\Http\Controllers\YeuThichController::class, 'index']);
    Route::post('/yeu-thich', [\App\Http\Controllers\YeuThichController::class, 'store']);
    Route::get('/yeu-thich/data', [\App\Http\Controllers\YeuThichController::class, 'getData']);
    Route::get('/yeu-thich/delete/{id}', [\App\Http\Controllers\YeuThichController::class, 'destroy']);

    Route::get('/thong-tin-ca-nhan', [\App\Http\Controllers\KhachHangController::class, 'view']);
    Route::get('/edit/{id}', [\App\Http\Controllers\KhachHangController::class, 'edit']);
    Route::post('/update', [\App\Http\Controllers\KhachHangController::class, 'update']);

    Route::post('/tao-don-hang', [\App\Http\Controllers\DonHangController::class, 'createDonHang']);
    Route::get('/don-hang/data', [\App\Http\Controllers\DonHangController::class, 'getData']);
    Route::get('/don-hang/chi-tiet/{id}', [\App\Http\Controllers\DonHangController::class, 'viewOrder']);
    Route::get('/don-hang/huy/{id}', [\App\Http\Controllers\DonHangController::class, 'cancelOrder']);
    Route::get('/don-hang/da-nhan-hang/{id}', [\App\Http\Controllers\DonHangController::class, 'orderCompleted']);

    Route::get('/don-hang/thanh-cong', [\App\Http\Controllers\DonHangController::class, 'success']);


    Route::post('/thanh-toan-momo', [\App\Http\Controllers\DonHangController::class, 'thanhToanMomo']);
    Route::get('/momo/ipn', [DonHangController::class, 'ipnMomo']);
    Route::get('/momo/notifi', [DonHangController::class, 'notifiMomo']);

    // Route::get('/danh-gia', [\App\Http\Controllers\DanhGiaController::class, 'index']);
    Route::post('/danh-gia', [\App\Http\Controllers\DanhGiaController::class, 'store']);
    Route::get('/danh-gia/data/{id}', [\App\Http\Controllers\DanhGiaController::class, 'getData']);
});

Route::get('/', [\App\Http\Controllers\HomePageController::class, 'index']);
Route::get('/san-pham/{id}', [\App\Http\Controllers\HomePageController::class, 'viewSanPham']);
Route::get('/danh-muc/{id}', [\App\Http\Controllers\HomePageController::class, 'viewDanhMuc']);
Route::post('/tim-kiem', [\App\Http\Controllers\HomePageController::class, 'search']);

Route::get('/san-pham-thinh-hanh', [\App\Http\Controllers\HomePageController::class, 'spThinhHanh']);
Route::get('/san-pham-noi-bat', [\App\Http\Controllers\HomePageController::class, 'spNoiBat']);
Route::get('/san-pham-hang-dau', [\App\Http\Controllers\HomePageController::class, 'spHangDau']);
Route::get('/san-pham-giam-gia', [\App\Http\Controllers\HomePageController::class, 'spGiamGia']);

Route::get('/watch/{id}', [\App\Http\Controllers\DonHangController::class, 'watch']);







