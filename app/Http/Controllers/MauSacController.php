<?php

namespace App\Http\Controllers;

use App\Models\MauSac;
use Illuminate\Http\Request;

class MauSacController extends Controller
{
    public function index()
    {
        return view('admin.pages.mau_sac.index');
    }
}
