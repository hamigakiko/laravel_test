<?php

namespace App\Http\Requests\Chats;

use Illuminate\Foundation\Http\FormRequest;

class ChatsStoreFormRequest extends FormRequest
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
            'chat_rooms_id' => 'numeric',
            'message'       => 'string|max:10',
        ];
    }

    public function messages()
    {
        return [
            'chat_rooms_id.numeric' => 'データが不明です。再入出してください。',
            'message.string'        => ':attributeは文字で入力してください。',
            'message.max'           => ':attributeは:max文字までに収めてください。',
        ];
    }

    public function attributes()
    {
        return [
            'message'    => 'メッセージ',
        ];
    }
}
