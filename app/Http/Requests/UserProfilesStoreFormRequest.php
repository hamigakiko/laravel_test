<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserProfilesStoreFormRequest extends FormRequest
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
            'birthday' => 'nullable|string|size:8',
            'sex'      => 'numeric|between:0,3',
        ];
    }

    public function messages()
    {
        return [
        'birthday.string'   => ':attributeは数字で入力してください。',
        'birthday.size'     => ':attributeは:size桁で入力してください。',
        'sex.required'      => ':attributeを入力してください。',
        'sex.between'       => '指定された:attributeを選択してください。',
        ];
    }

    public function attributes()
    {
        return [
            'birthday' => '誕生日',
            'sex'      => '性別',
        ];
    }
}
