<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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


    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'title.min'      => '标题最小2个字符',
            'title.max'      => '标题最大128个字符',
            'body.required'  => '内容不能为空',
            'body.max'       => '内容最大长度不能超过2000字'
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2|max:128',
            'body'  => 'required|max:2000'
        ];
    }
}
