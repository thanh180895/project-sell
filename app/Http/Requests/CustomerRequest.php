<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required|unique:customers,phone,'.$this->route('category'),
            'address' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'firstName.required' => 'vui lòng nhập tên ',
            'lastName.required' => 'vui lòng nhập họ ',
            'phone.required' => 'vui lòng nhập số điện thoại',
            'phone.unique' => 'số điện thoại đã tồn tại',
            'address.required' => 'vui lòng nhập mô tả',                
        ];
    }
}
