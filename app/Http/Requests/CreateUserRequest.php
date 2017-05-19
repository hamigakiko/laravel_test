<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'     => 'required|max:20',
            'email'    => 'required|email',
            'password' => 'required|between,8,40',
            'barthday' => 'nullable|numeric|size:8',
            'age'      => 'nullable|numeric|between:1,2',
            'sex'      => 'required|numeric',
        ];
    }


    public function messages()
    {
        return [
        'name.required'     => ':attributeを入力してください。',
        'name.max'          => ':attributeは:max文字以下で入力してください。',
        'email.required'    => ':attributeを入力してください。',
        'email.email'       => '正しく:attributeを入力してください。',
        'password.required' => ':attributeを入力してください。',
        'password.between'  => ':attributeは:minから:maxの間である必要があります。',
        'barthday.numeric'  => ':attributeは数値で入力してください。',
        'barthday.size'     => ':attributeは:size桁で入力してください。',
        'age.numeric'       => ':attributeは数値で入力してください。',
        'age.between'       => ':attributeは:minから:maxの間である必要があります。',
        'sex.required'      => ':attributeを入力してください。',
        ];
    }


    /**
     * Set custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'     => 'お名前',
            'email'    => 'メールアドレス',
            'password' => 'パスワード',
            'sex'      => '性別',
            'barthday' => '誕生日',
            'age'      => '年齢',
        ];
    }
}
