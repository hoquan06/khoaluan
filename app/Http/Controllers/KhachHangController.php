<?php

namespace App\Http\Controllers;

use App\Http\Requests\DangKyRequest;
use App\Http\Requests\DangNhapRequest;
use App\Mail\KichHoatMail;
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
        $data['mat_khau'] = bcrypt($request->mat_khau);
        KhachHang::create($data);

        //Gửi mail
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
        $data = $request->all();
        //Kiểm tra đăng nhập
        $check = Auth::guard('khach_hangs')->attempt($data);
        if($check){
            //Nếu đăng nhập thành công
            $khach_hang = Auth::guard('khach_hangs')->user();
            //Kiểm tra xem user đã active hay chưa
            if($khach_hang->is_email){ //Đã active
                return response()->json([
                    'login'         => 2,
                ]);
            } else{
                Auth::guard('khach_hangs')->logout();
                return response()->json([ //chưa active
                    'login'         => 1,
                ]);
            }
        } else{
            return response()->json([ //sai tk hoặc mk
                'login'         => 0,
            ]);
        }
    }

    public function active($hash)
    {
        $data = KhachHang::where('hash', $hash)->first();
        if($data->is_email){
            toastr()->warning('Tài khoản của bạn đã được kích hoạt trước đó!!!');
        } else{
            $data->is_email = 1;
            $data->save();
            toastr()->success("Đã xác thực mail thành công!!!");
        }
        return redirect('/khach-hang/login');
    }
}
