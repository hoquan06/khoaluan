<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'slide_1'              =>   'required',
            'slide_2'              =>   'required',
            'slide_3'              =>   'required',
        ];
    }

    public function messages()
    {
        return [
            'required'      =>  ':attribute không được để trống',
        ];
    }

    public function attributes()
    {
        return [
            'slide_1'         =>   'Slide 1',
            'slide_2'         =>   'Slide 2',
            'slide_3'         =>   'Slide 3',
        ];
    }
}
