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
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required',
            'barthday' => 'numeric',
            'age'      => 'numeric',
            'sex'      => 'required',
        ];
        // return [
        //     'name'     => 'required|max:20',
        //     'email'    => 'required|email|unique|max:100',
        //     'password' => 'required|alpha_num|min:6|max:100',
        //     // 'barthday' => 'numeric',
        //     // 'age'      => 'numeric',
        //     'sex'      => 'required',
        // ];
    }


    public function messages()
    {
        return [
        'name.required'     => ':attributeを入力してください。',
        'email.required'    => ':attributeを入力してください。',
        'password.required' => ':attributeを入力してください。',
        'sex.required'      => ':attributeを入力してください。',
        'barthday.numeric'  => ':attributeは数値で入力してください。',
        'age.numeric'       => ':attributeは数値で入力してください。',
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
