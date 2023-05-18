<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKhuyenMaiRequest extends FormRequest
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
            'ten_chuong_trinh'   => 'required|unique:khuyen_mais,ten_chuong_trinh, '. $this->id,
            'muc_giam'           => 'required|numeric|min:0',
            'san_pham_id'        => 'required|exists:san_phams,id',
            'thoi_gian_bat_dau'  => 'date_format:Y-m-d',
            'thoi_gian_ket_thuc' => 'date_format:Y-m-d|after:thoi_gian_bat_dau',
        ];
    }

    public function messages()
    {
        return [
            'required'                  => ":attribute không được để trống",
            'min'                       => ":attribute phải lớn hơn 0",
            'numeric'                   => ":attribute phải là số",
            'before'                    => ':attribute không hợp lệ',
            'after_or_equal'            => ':attribute phải lớn hơn ngày hôm nay',
            'after'                     => ':attribute phải lớn hơn Thời gian bắt đầu',
            'date'                      => ':attribute không đúng định dạng',
            'date_format'               => ':attribute không đúng định dạng',
        ];
    }

    public function attributes()
    {
        return [
            'ten_chuong_trinh'           => 'Tên chương trình',
            'muc_giam'                   => 'Mức giảm',
            'thoi_gian_bat_dau'          => 'Thời gian bắt đầu',
            'thoi_gian_ket_thuc'         => 'Thời gian kết thúc',
            'san_pham_id'                => 'Sản phẩm',
        ];
    }
}
