<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductRequest extends FormRequest
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
          'tag_category_id' => 'required|string|digits_between:1,3',
          'name' => "required|string|max:45",
          'price' => "required|integer",
          'content' => "required|string|max:1000",
          'model' => "required|string|max:45",
          'photo' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048'
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
          'digits_between' => '選択してください',
          'string' => '文字列で入力してください',
          'max' => 'max文字以下で入力してください',
          'file' => 'ファイル形式で入力してください',
          'image' => 'imageを選択してください',
          'mimes' => 'ファイル形式を確認してください',
          'photo.max' => 'サイズが大きすぎます'
        ];
    }
}
