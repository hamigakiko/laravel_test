<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAvatersStoreFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'avater_file' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'avater_file.image'    => ':attributeには(jpg、png、bmp、gif、svg)のものを指定してください。',
        ];
    }

    public function attributes()
    {
        return [
            'avater_file' => 'アバター画像',
        ];
    }
}
