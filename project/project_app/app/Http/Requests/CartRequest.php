<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
          'quentity' => "required|integer"
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
            'integer' => '数字以外は入力できません',
        ];
    }
}
