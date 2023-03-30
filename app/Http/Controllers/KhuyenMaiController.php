<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KhuyenMaiController extends Controller
{
    public function index()
    {
        return view('admin.pages.khuyen_mai.index');
    }

    
    public function store(Request $request)
    {

    }
}
