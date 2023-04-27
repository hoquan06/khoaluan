<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    use HasFactory;
    protected $table = 'khuyen_mais';
    protected $fillable = [
        'ten_chuong_trinh',
        'danh_muc_id',
        'muc_giam',
        'thoi_gian_bat_dau',
        'thoi_gian_ket_thuc',
    ];
}
