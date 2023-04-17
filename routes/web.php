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
        Route::get('/data', [\App\Http\Controllers\SanPhamController::class, 'getData']);
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
        Route::get('/view/{id}', [\App\Http\Controllers\DonHangController::class, 'view']);
        Route::get('/accept/{id} ', [\App\Http\Controllers\DonHangController::class, 'accept']);
    });
});

Route::prefix('khach-hang')->group(function () {
    Route::get('/register', [\App\Http\Controllers\KhachHangController::class, 'register']);
    Route::post('/register', [\App\Http\Controllers\KhachHangController::class, 'registerAction']);
    Route::get('/login', [\App\Http\Controllers\KhachHangController::class, 'login']);
    Route::post('/login', [\App\Http\Controllers\KhachHangController::class, 'loginAction']);
    Route::get('/active/{hash}', [\App\Http\Controllers\KhachHangController::class, 'active']);
    Route::get('/logout', [\App\Http\Controllers\KhachHangController::class, 'logout']);

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

    Route::get('/tao-don-hang', [\App\Http\Controllers\DonHangController::class, 'createDonHang']);
    Route::get('/don-hang/data', [\App\Http\Controllers\DonHangController::class, 'getData']);
    Route::get('/don-hang/chi-tiet/{id}', [\App\Http\Controllers\DonHangController::class, 'viewOrder']);
    Route::get('/don-hang/huy/{id}', [\App\Http\Controllers\DonHangController::class, 'cancelOrder']);

    Route::post('/thay-doi-mat-khau', [\App\Http\Controllers\KhachHangController::class, 'changePassword']);
});

Route::get('/', [\App\Http\Controllers\HomePageController::class, 'index']);
Route::get('/san-pham/{id}', [\App\Http\Controllers\HomePageController::class, 'viewSanPham']);
Route::get('/danh-muc/{id}', [\App\Http\Controllers\HomePageController::class, 'viewDanhMuc']);
Route::post('/search', [\App\Http\Controllers\HomePageController::class, 'search']);

Route::get('/watch/{id}', [\App\Http\Controllers\DonHangController::class, 'watch']);




