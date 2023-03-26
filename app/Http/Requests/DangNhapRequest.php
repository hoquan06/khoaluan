<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangNhapRequest extends FormRequest
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
            'email'         => 'required',
            'password'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required'     => ':attribute không được để trống',
        ];
    }

    public function attributes()
    {
        return [
            'email'         => 'Email',
            'password'      => 'Mật khẩu',
        ];
    }
}
