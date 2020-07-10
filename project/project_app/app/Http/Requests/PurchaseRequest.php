<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'string' => '文字列以外は入力できません',
            'integer' => '数字のみで入力してください',
            'digits_between' => '正しく入力してください'
        ];
    }
}
