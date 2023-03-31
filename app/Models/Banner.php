<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = [
        'banner_1',
        'banner_2',
        'banner_3',
        'link_banner_1',
        'link_banner_2',
        'link_banner_3',
    ];
}
