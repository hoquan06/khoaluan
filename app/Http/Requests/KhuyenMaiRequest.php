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
            'muc_giam'           => 'required|lt:san_phams, gia_ban',
            'thoi_gian_bat_dau'  => 'required|date|after_or_equal:today|max:10',
            'thoi_gian_ket_thuc' => 'required|date|after:thoi_gian_bat_dau|max:10',
        ];
    }

    public function messages()
    {
        return [
            'required'          => ":attribute không được để trống",
            'min'               => ":attribute quá ngắn",
            'numeric'           => ":attribute phải là số",
            'before'            => ':attribute không hợp lệ',
            'after_or_equal'    => ':attribute phải lớn hơn ngày hôm nay',
            'after'             => ':attribute phải lớn hơn Thời gian bắt đầy',
            'date'              => ':attribute không đúng định dạng',
            'muc_giam.lt'       => 'Mức giảm không được lớn hơn giá bán'
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
