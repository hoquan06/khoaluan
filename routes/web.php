<?php

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
        Route::get('data', [\App\Http\Controllers\SanPhamController::class, 'getData']);
        Route::get('/doi-trang-thai/{id}', [\App\Http\Controllers\SanPhamController:: class, 'doiTrangThai']);
        Route::get('/delete/{id}', [\App\Http\Controllers\SanPhamController::class, 'destroy']);
        Route::get('/edit/{id}', [\App\Http\Controllers\SanPhamController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\SanPhamController::class, 'update']);

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
        Route::get('/data', [\App\Http\Controllers\KhuyenMaiController::class, 'getData']);
    });

    Route::prefix('tai-khoan')->group(function () {
        Route::get('/index', [\App\Http\Controllers\TaiKhoanController::class, 'index']);
        Route::get('/delete/{id}', [\App\Http\Controllers\TaiKhoanController::class, 'destroy']);
        Route::get('/lock/{id}', [\App\Http\Controllers\TaiKhoanController::class, 'lock']);
    });

    Route::prefix('don-hang')->group(function () {
        Route::get('/index', [\App\Http\Controllers\DonHangController::class, 'index']);
        Route::get('/delete/{id}', [\App\Http\Controllers\DonHangController::class, 'destroy']);
    });
});

Route::prefix('khach-hang')->group(function () {
    Route::get('/register', [\App\Http\Controllers\KhachHangController::class, 'register']);
    Route::post('/register', [\App\Http\Controllers\KhachHangController::class, 'registerAction']);
    Route::get('/login', [\App\Http\Controllers\KhachHangController::class, 'login']);
    Route::post('/login', [\App\Http\Controllers\KhachHangController::class, 'loginAction']);
    Route::get('/active/{hash}', [\App\Http\Controllers\KhachHangController::class, 'active']);
    Route::get('/logout', [\App\Http\Controllers\KhachHangController::class, 'logout']);

    Route::get('/gio-hang', [\App\Http\Controllers\ChiTietDonHangController::class, 'index']);
    Route::post('/gio-hang', [\App\Http\Controllers\ChiTietDonHangController::class, 'addToCart']);
    Route::get('/gio-hang/data', [\App\Http\Controllers\ChiTietDonHangController::class, 'dataCart']);
    Route::post('/gio-hang/update', [\App\Http\Controllers\ChiTietDonHangController::class, 'cartUpdate']);
    Route::get('/gio-hang/delete/{id}', [\App\Http\Controllers\ChiTietDonHangController::class, 'cartDelete']);
    // Route::post('/gio-hang/delete', [\App\Http\Controllers\ChiTietDonHangController::class, 'cartDelete']);

    Route::get('/yeu-thich', [\App\Http\Controllers\YeuThichController::class, 'index']);
    Route::post('/yeu-thich', [\App\Http\Controllers\YeuThichController::class, 'store']);

    Route::get('/thong-tin-ca-nhan', [\App\Http\Controllers\QuanLyThongTinController::class, 'index']);
    Route::get('/edit/{id}', [\App\Http\Controllers\QuanLyThongTinController::class, 'edit']);
    Route::post('/update', [\App\Http\Controllers\QuanLyThongTinController::class, 'update']);

    Route::get('/tao-don-hang', [\App\Http\Controllers\DonHangController::class, 'createDonHang']);
});

Route::get('/', [\App\Http\Controllers\HomePageControlller::class, 'index']);
Route::get('/san-pham/{id}', [\App\Http\Controllers\HomePageControlller::class, 'viewSanPham']);
Route::get('/danh-muc/{id}', [\App\Http\Controllers\HomePageControlller::class, 'viewDanhMuc']);
Route::post('/search', [\App\Http\Controllers\HomePageControlller::class, 'search']);



