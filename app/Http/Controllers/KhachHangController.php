<?php

namespace App\Http\Controllers;

use App\Http\Requests\DangKyRequest;
use App\Http\Requests\DangNhapRequest;
use App\Mail\KichHoatMail;
use App\Models\DanhMucSanPham;
use App\Models\KhachHang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class KhachHangController extends Controller
{
    public function register()
    {
        return view('client.pages.tai_khoan.dang_ky');
    }

    public function registerAction(DangKyRequest $request)
    {
        //Tách họ và tên
        $parts = explode(" ", $request->ho_va_ten);
        if(count($parts) > 1) {
            $lastname = array_pop($parts);
            $firstname = implode(" ", $parts);
        }
        else
        {
            $firstname = $request->ho_va_ten;
            $lastname = " ";
        }
        $data = $request->all();
        $data['ho_lot'] = $firstname;
        $data['ten'] = $lastname;
        $data['hash'] = Str::uuid();
        $data['password'] = bcrypt($request->password);
        KhachHang::create($data);

        // Gửi mail
        Mail::to($request->email)->send(new KichHoatMail(
            $request->ho_va_ten,
            $data['hash'],
            'Kích Hoạt Tài Khoản Đăng Ký'
        ));

        return response()->json([
            'dangky'        => true,
        ]);
    }

    public function login()
    {
        return view('client.pages.tai_khoan.dang_nhap');
    }

    public function loginAction(DangNhapRequest $request)
    {
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $check = Auth::guard('khach_hang')->attempt($data);
        if($check){
            $khach_hang = Auth::guard('khach_hang')->user();
            if($khach_hang->loai_tai_khoan){
                return response()->json([
                    'login'         => 2,
                ]);
            } else{
                Auth::guard('khach_hang')->logout();
                return response()->json([
                    'login'         => 1,
                ]);
            }
        } else{
            return response()->json([
                'login'         => 0,
            ]);
        }
    }

    public function active($hash)
    {
        $data = KhachHang::where('hash', $hash)->first();
        if($data->loai_tai_khoan){
            toastr()->warning('Tài khoản của bạn đã được kích hoạt trước đó!!!');
        } else{
            $data->loai_tai_khoan = 1;
            $data->save();
            toastr()->success("Đã xác thực mail thành công!!!");
        }
        return redirect('/khach-hang/login');
    }
}
