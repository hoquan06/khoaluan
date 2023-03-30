<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = [
        'slide_1',
        'slide_2',
        'slide_3',
        'banner_1',
        'banner_2',
        'banner_3',
    ];
}
