<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name' => 'required|unique:categories,category_name,'.$this->route('category'), 
            'category_desc' => 'required',
            'category_status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'category_name.required' => 'vui lòng nhập tên ',
            'category_name.unique' => 'tên đã tồn tại',
            'category_desc.required' => 'vui lòng nhập mô tả',           
            'category_status.required' => 'vui lòng nhập trạng thái ',           
        ];
    }
}
