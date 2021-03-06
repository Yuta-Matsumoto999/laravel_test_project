<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
          'birthday' => 'required|date|before_or_equal:today',
          'gender' => 'required',
          'address_num' => 'required|integer|digits_between:7,7',
          'address' => 'required|string'
        ];
    }

    /**
     * custom message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => '必須の項目です',
            'date' => '形式を確認してください',
            'before_or_equal:today' => '本日以降は指定できません',
            'string' => '文字列以外は入力できません',
            'integer' => '数字のみで入力してください',
            'digits_between' => '正しく入力してください'
        ];
    }
}
