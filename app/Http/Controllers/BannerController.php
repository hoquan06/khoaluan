<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.pages.banner.index');
    }

    public function store(BannerRequest $request)
    {
        $data = $request->all();
        Banner::create($data);
        return response()->json([
            'status' => true,
        ]);
    }
}
