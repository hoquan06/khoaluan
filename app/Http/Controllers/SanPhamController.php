<?php

namespace App\Http\Controllers;

use App\Http\Requests\SanPhamRequest;
use App\Http\Requests\UpdateSanPhamRequest;
use App\Models\DanhMucSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index()
    {
        return view('admin.pages.san_pham.index');
    }

    public function store(SanPhamRequest $request)
    {
        $data = $request->all();
        SanPham::create($data);

        return response()->json([
            'themMoi'   => true,
        ]);
    }

    public function getData()
    {
        $danh_sachDM = DanhMucSanPham::where('tinh_trang', 1)
                                     ->where('id_danh_muc_cha', '<>', 0)
                                     ->get();
        // $dsSanPham = "SELECT san_phams.*, danh_muc_san_phams.ten_danh_muc
        //                  FROM san_phams JOIN danh_muc_san_phams
        //                  ON san_phams.id_danh_muc = danh_muc_san_phams.id";
        $dsSanPham = SanPham::join('danh_muc_san_phams', 'san_phams.id_danh_muc','danh_muc_san_phams.id')
                            ->select('san_phams.*', 'danh_muc_san_phams.ten_danh_muc')
                            ->get();
        return response()->json([
            'danhsachDM'        => $danh_sachDM,
            'danhsachSP'        => $dsSanPham,
        ]);
    }

    public function doiTrangThai($id)
    {
        $data = SanPham::find($id);
        if($data){
            $data->tinh_trang = !$data->tinh_trang;
            $data->save();
            return response()->json([
                'doitrangthai'      => true,
                'tinhtrang'         => $data->tinh_trang,
            ]);
        } else{
            return response()->json([
                'doitrangthai'      => false,
            ]);
        }
    }

    public function destroy($id)
    {
        $data = SanPham::find($id);
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

    public function edit($id)
    {
        $data = SanPham::find($id);
        if($data){
            return response()->json([
                'edit'      => true,
                'data'      => $data,
            ]);
        } else{
            return response()->json([
                'edit'      => false,
            ]);
        }
    }

    public function update(UpdateSanPhamRequest $request)
    {
        $data = $request->all();
        $sanPham = SanPham::find($request->id);
        $sanPham->update($data);
        if($sanPham){
            return response()->json([
                'update'        => true,
            ]);
        } else{
            return response()->json([
                'update'        => false,
            ]);
        }
    }
}
