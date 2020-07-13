<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEditProductRequest extends FormRequest
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
          'tag_category_id' => 'required',
          'name' => "required|string|max:45",
          'price' => "required|integer",
          'content' => "required|string|max:1000",
          'model' => "required|string|max:45",
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
          'string' => '文字列で入力してください',
          'max' => 'max文字以下で入力してください',
        ];
    }
}