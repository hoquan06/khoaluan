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
        'mat_khau',
        'dia_chi',
        'is_block',
        'is_email',
        'hash',
    ];
}
