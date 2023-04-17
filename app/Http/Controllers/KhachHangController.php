<?php

namespace App\Http\Controllers;

use App\Http\Requests\CapNhatMatKhauRequest;
use App\Http\Requests\DangKyRequest;
use App\Http\Requests\DangNhapRequest;
use App\Http\Requests\QuenMatKhauRequest;
use App\Http\Requests\ThayDoiMatKhauRequest;
use App\Mail\CapNhatMatKhau;
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
            if($khach_hang->loai_tai_khoan == 1 && $khach_hang->is_lock == 0){
                return response()->json([
                    'login'         => 2,
                ]);
            } else if($khach_hang->loai_tai_khoan == 1 && $khach_hang->is_lock == 1){
                Auth::guard('khach_hang')->logout();
                return response()->json([
                    'login'         => 3,
                ]);
            } else if($khach_hang->loai_tai_khoan == 0 && $khach_hang->is_lock == 0){
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
        if($data->loai_tai_khoan == 1){
            toastr()->warning('Tài khoản của bạn đã được kích hoạt trước đó!!!');
        } else{
            $data->loai_tai_khoan = 1;
            $data->save();
            toastr()->success("Tài khoản của bạn đã được xác thực", "Thành công!!!");
        }
        return redirect('/khach-hang/login');
    }

    public function logout()
    {
        Auth::guard('khach_hang')->logout();
        toastr()->success("Đã đăng xuất", "Thành công!!!");
        return redirect()->back();
    }

    public function view()
    {
        return view('client.pages.thong_tin_ca_nhan.index');
    }

    public function edit($id)
    {
        $data = KhachHang::find($id);

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

    public function update(Request $request)
    {
        $agent = Auth::guard('khach_hang')->user();
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
        if($agent) {
            $khach_hang = KhachHang::find($agent->id);
            $data     = $request->all();
            $data['ho_lot'] = $firstname;
            $data['ten'] = $lastname;
            $khach_hang->update($data);

            if($khach_hang){
                return response()->json([
                    'update'      => true,
                ]);
            } else{
                return response()->json([
                    'update'      => false,
                ]);
            }
        }
    }

    public function resetPassword()
    {
        return view('client.pages.tai_khoan.quen_mat_khau');
    }

    public function actionResetPassword(QuenMatKhauRequest $request)
    {
        $khach_hang = KhachHang::where('email', $request->email)->first();
        $hash_reset = Str::uuid();

        $khach_hang->hash_reset = $hash_reset;
        $khach_hang->save();

        //Gửi mail
        Mail::to($request->email)->send(new CapNhatMatKhau(
            $khach_hang['hash_reset'],
            'Cập nhật lại mật khẩu'
        ));

        return response()->json([
            'reset'     => true,
        ]);
    }

    public function UpdatePassword($hash_reset)
    {
        $khach_hang = KhachHang::where('hash_reset', $hash_reset)->first();
        if($khach_hang){
            return view('client.pages.tai_khoan.cap_nhat_mat_khau', compact('hash_reset'));
        } else{
            toastr()->error('Liên kết không tồn tại!', 'Lỗi');
            return redirect('/');
        }
    }

    public function actionUpdatePassword(CapNhatMatKhauRequest $request)
    {
        $khach_hang = KhachHang::where('hash_reset', $request->hash_reset)->first();
        $khach_hang->hash_reset = 'NULL';
        $khach_hang->password = bcrypt($request->password);
        $khach_hang->save();

        return response()->json([
            'changepass'    => true,
        ]);
    }

    public function changePassword(ThayDoiMatKhauRequest $request)
    {
        $agent = Auth::guard('khach_hang')->user();
        if($agent){
            $khach_hang = KhachHang::find($agent->id);
            $data = $request->all();
            $data['password'] = bcrypt($request->password);
            $khach_hang->update($data);
            return response()->json([
                'doimatkhau'        => true,
            ]);
        } else{
            return response()->json([
                'doimatkhau'        => false,
            ]);
        }
    }
}
