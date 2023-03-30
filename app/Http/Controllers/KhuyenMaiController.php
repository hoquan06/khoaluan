<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhuyenMai;

class KhuyenMaiController extends Controller
{
    public function index()
    {
        return view('admin.pages.khuyen_mai.index');
    }


    public function store(Request $request)
    {
        $data = $request->all();
        KhuyenMai::create($data);
        return response()->json(["status" => true]);
    }
}
