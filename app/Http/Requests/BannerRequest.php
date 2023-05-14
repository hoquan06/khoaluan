<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'banner_1'                  => 'required',
            'banner_2'                  => 'required',
            'banner_3'                  => 'required',
            'link_banner_1'             => 'required',
            'link_banner_2'             => 'required',
            'link_banner_3'             => 'required',
        ];
    }

    public function messages()
    {
        return [
            'banner_1.required'                  => 'Banner 1 không được để trống',
            'banner_2.required'                  => 'Banner 2 không được để trống',
            'banner_3.required'                  => 'Banner 3 không được để trống',
            'link_banner_1.required'             => 'Link banner 1 không được để trống',
            'link_banner_2.required'             => 'Link banner 2 không được để trống',
            'link_banner_3.required'             => 'Link banner 3 không được để trống',
        ];
    }
}
