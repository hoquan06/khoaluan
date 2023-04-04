<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;

class SlideController extends Controller
{
    public function index() 
    { 
        $slide = Slide::all();
        return view('admin.pages.slide.index',compact('slide'));
    }

    public function store(Request $request) 
    {
        $data = $request->all();
        Slide::create($data);
        return response()->json([
            'status' => true,
        ]);
    }
}
