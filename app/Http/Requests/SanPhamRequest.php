<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
            'ten_san_pham'         =>   'required|min:5|max:100|unique:san_phams,ten_san_pham',
            'slug_san_pham'        =>   'required|unique:san_phams,slug_san_pham',
            'so_luong'             =>   'required|numeric|min:0',
            'gia_ban'              =>   'required|numeric',
            'gia_khuyen_mai'       =>   'nullable|numeric|lt:gia_ban',
            'hinh_anh'             =>   'required',
            'hinh_anh_2'           =>   'nullable',
            'hinh_anh_3'           =>   'nullable',
            'hinh_anh_4'           =>   'nullable',
            'mo_ta_ngan'           =>   'required',
            'mo_ta_chi_tiet'       =>   'required',
            'id_danh_muc'          =>   'required|exists:danh_muc_san_phams,id',
            'tinh_trang'           =>   'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'required'      =>  ':attribute không được để trống',
            'max'           =>  ':attribute quá dài',
            'min'           =>  ':attribute quá ngắn',
            'exists'        =>  ':attribute không tồn tại',
            'boolean'       =>  ':attribute chỉ được chọn True/False',
            'unique'        =>  ':attribute đã tồn tại',
            'numeric'       =>  ':attribute phải là số',
        ];
    }

    public function attributes()
    {
        return [
            'ten_san_pham'         =>   'Tên sản phẩm',
            'slug_san_pham'        =>   'Slug sản phẩm',
            'so_luong'             =>   'Số lượng',
            'gia_ban'              =>   'Giá bán',
            'gia_khuyen_mai'       =>   'Giá khuyến mãi',
            'hinh_anh'             =>   'Ảnh đại diện',
            'hinh_anh_2'           =>   'Hình ảnh',
            'hinh_anh_3'           =>   'Hình ảnh',
            'hinh_anh_4'           =>   'Hình ảnh',
            'mo_ta_ngan'           =>   'Mô tả ngắn',
            'mo_ta_chi_tiet'       =>   'Mô tả chi tiết',
            'id_danh_muc'          =>   'Danh mục',
            'tinh_trang'           =>   'Tình trạng',
        ];
    }
}
