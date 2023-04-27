<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhGiaRequest extends FormRequest
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
            'so_sao'            => 'required',
            'noi_dung'          => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required'          => ":attribute không được để trống",
        ];
    }

    public function attributes()
    {
        return [
            'so_sao'            => 'Số sao',
            'noi_dung'          => 'Nội dung',
        ];
    }
}
