<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Authenticatable
{
    use HasFactory;

    protected $table='khach_hangs';
    protected $fillable = [
        'ho_lot',
        'ten',
        'ho_va_ten',
        'ngay_sinh',
        'so_dien_thoai',
        'email',
        'password',
        'dia_chi',
        'loai_tai_khoan',
        'is_block',
        'hash',
    ];
}
