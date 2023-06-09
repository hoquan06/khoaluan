<?php

namespace App\Http\Controllers;
use App\Http\Requests\SlideRequest;

use Illuminate\Http\Request;
use App\Models\Slide;

class SlideController extends Controller
{
    public function index() 
    { 
        $slide = Slide::all();
        return view('admin.pages.slide.index',compact('slide'));
    }

    public function store(SlideRequest $request) 
    {
        $data = $request->all();
        Slide::create($data);
        return response()->json([
            'status' => true,
        ]);
    }
}
