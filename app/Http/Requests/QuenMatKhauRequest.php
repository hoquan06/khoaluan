<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuenMatKhauRequest extends FormRequest
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
            'email'             => 'required|email|exists:khach_hangs,email',
            // 'g-recaptcha-response'  => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'required'          => ':attribute không được để trống',
            'email'             => ':attribute không đúng định dạng',
            'exists'            => ':attribute không tồn tại trong hệ thống',
            // 'g-recaptcha-response.*'  =>  'Vui lòng phải chọn vào recaptcha',
        ];
    }

    public function attributes()
    {
        return [
            'email'             => 'Email'
        ];
    }
}
