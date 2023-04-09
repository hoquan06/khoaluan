<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuThich extends Model
{
    use HasFactory;

    protected $table = 'yeu_thiches';
    protected $fillable = [
        'san_pham_id',
        'ten_san_pham',
        'so_luong',
        'don_gia',
        'agent_id',
    ];
}
