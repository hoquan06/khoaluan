<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index() 
    {
        return view('admin.pages.banner.index');
    }

    public function store(Request $request) 
    {
        $data = $request->all();
        Banner::create($data);
        return response()->json([
            'status' => true,
        ]);
    }
}
