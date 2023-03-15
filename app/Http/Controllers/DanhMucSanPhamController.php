<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhMucSanPhamRequest;
use App\Http\Requests\DanhMucUpdateRequest;
use App\Models\DanhMucSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhMucSanPhamController extends Controller
{
    public function index()
    {
        return view('admin.pages.danh_muc_san_pham.index');
    }

    public function store(DanhMucSanPhamRequest $request)
    {
        $data = $request->all();
        DanhMucSanPham::create($data);

        return response()->json([
            'themMoi'    => true,
        ]);
    }

    public function doiTrangThai($id)
    {
        $data = DanhMucSanPham::find($id);
        if($data){
            $data->tinh_trang = !$data->tinh_trang;
            $data->save();
            return response()->json([
                'doitrangthai'      => true,
                'tinhtrang'         => $data->tinh_trang,
            ]);
        }else{
            return response()->json([
                'doitrangthai'      => false,
            ]);
        }
    }

    public function destroy($id)
    {
        $data = DanhMucSanPham::find($id);
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
        $data = DanhMucSanPham::find($id);
        if($data){
            return response()->json([
                'edit'      => true,
                'data'      => $data,
            ]);
        } else{
            return response()->json([
                'edit'        => false,
            ]);
        }
    }

    public function update(DanhMucUpdateRequest $request)
    {
        $data     = $request->all();
        $danh_muc = DanhMucSanPham::find($request->id);
        $danh_muc->update($data);
        if($danh_muc){
            return response()->json([
                'update'      => true,
            ]);
        } else{
            return response()->json([
                'update'      => false,
            ]);
        }
    }

    public function getData()
    {
        $sql = "SELECT a. *, b.`ten_danh_muc` AS ten_danh_muc_cha
                FROM danh_muc_san_phams a LEFT JOIN danh_muc_san_phams b
                ON a.id_danh_muc_cha = b.id";
        $data = DB::select($sql);
        $danh_muc_cha = DanhMucSanPham::where('id_danh_muc_cha', 0)->get();

        return response()->json([
            'danh_sach'         => $data,
            'danh_muc_cha'      => $danh_muc_cha,
        ]);
    }
}
