<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'don_hangs';

    protected $fillable = [
        'ma_don_hang',
        'tong_tien',
        'tien_giam_gia',
        'thuc_tra',
        'agent_id',
        'loai_thanh_toan',
        'dia_chi_giao_hang',
<<<<<<< HEAD
        'tinh_trang',
=======
        'tinh_trang'
>>>>>>> f1e914167452936932355aa3d16e1e887aecb734
    ];
}
