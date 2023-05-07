<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhuyenMaiRequest extends FormRequest
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
            'ten_chuong_trinh'   => 'required',
            'muc_giam'           => 'required|min:10|numeric|before:today',
            'thoi_gian_bat_dau'  => 'date|required',
            'thoi_gian_ket_thuc' => 'date|required',
        ];
    }

    public function messages()
    {
        return [
            'required'          => ":attribute không được để trống",
            'min'               => ":attribute quá ngắn",
            'numeric'           => ":attribute phải là số",
            'before'            => ':attribute không hợp lệ',
            'date'              => ':attribute không đúng định dạng',

        ];
    }

    public function attributes()
    {
        return [
            'ten_chuong_trinh'           => 'Tên chương trình',
            'muc_giam'                   => 'Mức giảm',
            'thoi_gian_bat_dau'          => 'Thời gian bắt đầu',
            'thoi_gian_ket_thuc'         => 'Thời gian kết thúc',
        ];
    }
}
