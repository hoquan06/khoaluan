<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonHangRequest extends FormRequest
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
            'dia_chi_nhan_hang'             => 'required|min:20'
        ];
    }

    public function messages()
    {
        return [
            'required'                      => ':attribute không được để trống',
            'min'                           => ':attribute quá ngắn'
        ];
    }

    public function attributes()
    {
        return [
            'dia_chi_nhan_hang'             => 'Địa chỉ nhận hàng'
        ];
    }
}
