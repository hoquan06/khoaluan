<?php

namespace App\Providers;

use App\Models\DanhMucSanPham;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $menuCha = DanhMucSanPham::where('id_danh_muc_cha', 0)
                                 ->where('tinh_trang', 1)
                                 ->get();
        $menuCon = DanhMucSanPham::where('id_danh_muc_cha', '<>', 0)
                                 ->where('tinh_trang', 1)
                                 ->get();

        view()->share('menuCha', $menuCha);
        view()->share('menuCon', $menuCon);
    }
}
