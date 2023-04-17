<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CapNhatMatKhauRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'password'              => 'required|min:2|max:50',
            're_password'           => 'required|same:password',
            'hash_reset'            => 'required|exists:khach_hangs,hash_reset'
        ];
    }

    public function messages()
    {
        return [
            'required'              => ':attribute không được để trống',
            'min'                   => ':attribute quá ngắn',
            'max'                   => ':attribute quá dài',
            'same'                  => ':attribute và mật khẩu không trùng khớp',
            'exists'                => ':attribute không tồn tại',
        ];
    }

    public function attributes()
    {
        return [
            'password'              => 'Mật khẩu',
            're_password'           => 'Nhập lại mật khẩu',
        ];
    }
}
