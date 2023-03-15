<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucUpdateRequest extends FormRequest
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
            'ten_danh_muc'      => 'required|min:3|max:50|unique:danh_muc_san_phams,ten_danh_muc,' .$this->id, //unique: không được trùng
            'slug_danh_muc'     => 'required|min:3|max:50|unique:danh_muc_san_phams,slug_danh_muc,' .$this->id, //trừ cái tên và slug của nó ra
            'hinh_anh'          => 'required',
            'id_danh_muc_cha'   => 'required',
            'tinh_trang'        => 'required|boolean',
            'id'                => 'required|exists:danh_muc_san_phams,id',
        ];
    }

    public function messages()
    {
        return [
            'required'          => ':attribute không được để trống',
            'min'               => ':attribute quá ngắn',
            'max'               => ':attribute quá dài',
            'unique'            => ':attribute đã tồn tại',
            'exists'            => ':attribute không tồn tại',
            'boolean'           => ':attribute chỉ được chọn True/False',
        ];
    }

    public function attributes()
    {
        return [
            'ten_danh_muc'      => 'Tên danh mục',
            'slug_danh_muc'     => 'Slug danh mục',
            'hinh_anh'          => 'Hình ảnh',
            'id_danh_muc_cha'   => 'Danh mục cha',
            'tinh_trang'        => 'Tình trạng',
            'id'                => 'Danh mục sản phẩm',
        ];
    }
}
