<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = [
        "id_don_hang",
        "id_khach_hang",
        "ma_don_hang",
        "transId",
        "ngay_thanh_toan",
        "so_tien",
        "message",
        "signature",
        "trang_thai",
    ];
}
