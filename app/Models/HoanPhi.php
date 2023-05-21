<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoanPhi extends Model
{
    use HasFactory;

    protected $table = 'hoan_phis';
    protected $fillable = [
        'ten_khach_hang',
        'so_dien_thoai',
        'so_tien',
    ];
}
