<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\YeuThich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YeuThichController extends Controller
{
    public function index()
    {
        return view('client.pages.yeu_thich.index');
    }
    public function store(Request $request)
    {
        $agent = Auth::guard('khach_hang')->user();
        if($agent){
            $sanPham = SanPham::find($request->san_pham_id);
            $yeuThich = YeuThich::where('agent_id', $agent->id)
                                ->where('san_pham_id', $sanPham->id)
                                ->first();
            if($yeuThich){
                $yeuThich->delete();
                return response()->json([
                    'yeuthich'      => 1,
                ]);
            } else{
                YeuThich::create([
                    'san_pham_id'           => $sanPham->id,
                    'ten_san_pham'          => $sanPham->ten_san_pham,
                    'so_luong'              => $request->so_luong,
                    'don_gia'               => $sanPham->gia_khuyen_mai ? $sanPham->gia_khuyen_mai : $sanPham->gia_ban,
                    'agent_id'              => $agent->id,
                ]);
                return response()->json([
                    'yeuthich'      => 2,
                ]);
            }
        } else{
            return response()->json([
                'yeuthich'          => 3,
            ]);
        }
    }

    public function getData(){
        $agent = Auth::guard('khach_hang')->user();
        if($agent){
            $data = YeuThich::join('san_phams', 'yeu_thiches.san_pham_id', 'san_phams.id')
                            ->where('agent_id', $agent->id)
                            ->select('yeu_thiches.*', 'san_phams.hinh_anh', 'san_phams.slug_san_pham')
                            ->get();
            return response()->json([
                'yeuthich'      => $data,
            ]);
        }
    }

    public function destroy($id)
    {
        $agent = Auth::guard('khach_hang')->user();
        if($agent){
            $data = YeuThich::find($id);
            if($data){
                $data->delete();
                return response()->json([
                    'xoa'       => true,
                ]);
            } else{
                return response()->json([
                    'xoa'       => false,
                ]);
            }
        }
    }
}
