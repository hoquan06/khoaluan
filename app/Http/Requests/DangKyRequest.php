<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'ho_va_ten'             => 'required|min:4|max:50',
            'ngay_sinh'             => 'date_format:Y-m-d|before:today',
            'so_dien_thoai'         => 'required|digits:10|unique:khach_hangs,so_dien_thoai',
            'email'                 => 'required|email|unique:khach_hangs,email',
            'password'              => 'required|min:2|max:50',
            're_password'           => 'required|same:password',
            'dia_chi'               => 'required|min:5',
            'agree'                 => 'accepted',
            // 'g-recaptcha-response'  => 'captcha|accepted',
        ];
    }

    public function messages()
    {
        return [
            'required'                       => ':attribute không được để trống',
            'min'                            => ':attribute quá ngắn',
            'max'                            => ':attribute quá dài',
            'date_format'                    => ':attribute không đúng định dạng',
            'before'                         => ':attribute không hợp lệ',
            'digits'                         => ':attribute phải là 10 số',
            'unique'                         => ':attribute đã tồn tại',
            'email'                          => ':attribute không đúng định dạng',
            'same'                           => ':attribute và mật khẩu không trùng khớp',
            'agree.accepted'                 => 'Bạn phải đồng ý điều khoản!',
            // 'g-recaptcha-response.accepted'  => 'Vui lòng xác minh rằng bạn không phải là người máy'
        ];
    }

    public function attributes()
    {
        return [
            'ho_va_ten'             => 'Họ và tên',
            'ngay_sinh'             => 'Ngày sinh',
            'so_dien_thoai'         => 'Số điện thoại',
            'email'                 => 'Email',
            'password'              => 'Mật khẩu',
            're_password'           => 'Nhập lại mật khẩu',
            'dia_chi'               => 'Địa chỉ',
        ];
    }
}
