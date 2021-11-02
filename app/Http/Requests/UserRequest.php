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
            'name' => 'required', 
            'email' => 'required|unique:users,name,'.$this->route('user'),
            'role' => 'required',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'vui lòng nhập tên ',
            'email.required' => 'vui lòng nhập email ',
            'email.unique' => 'email đã tồn tại',
            'role.required' => 'vui lòng nhập chức vụ',                         
            'password.required' => 'vui lòng nhập mật khẩu'                         
        ];
    }
}
