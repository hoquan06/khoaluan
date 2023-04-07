<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanLyThongTinController extends Controller
{
    public function index()
    {
        return view('client.thong_tin_ca_nhan.index');
    }
}
