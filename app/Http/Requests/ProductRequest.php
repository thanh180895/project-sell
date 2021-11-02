<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if($this->route('product')){
            return [
                'name'        => 'required|unique:products,name,'.$this->route('product'),
                'description' => 'required',
                'image'       => 'required|unique:products,image,'.$this->route('product'),
                'price'       => 'required'
            ]; 
        }
        else{   
            return [
                'name'        => 'required|unique:products,name',
                'description' => 'required',
                'image'       => 'required|unique:products,image',
                'price'       => 'required'
            ]; 
        }
         
    }
    public function messages()
    {
        return [
            'name.required' => 'vui lòng nhập tên ',
            'name.unique' => 'tên đã tồn tại',
            'description.required' => 'vui lòng nhập mô tả ',
            'image.required' => 'vui lòng nhập ảnh ',   
            'price.required' => 'vui lòng nhập giá'                 
        ];
    }
}
