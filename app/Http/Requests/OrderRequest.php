<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
          
            'orderDate' => 'required',
            'shippedDate' => 'required',
            'status' => 'required',
            'customer_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'orderDate.required' => 'vui lòng nhập ngày đặt hàng ',
            'shippedDate.required' => 'vui lòng nhập ngày giao hàng',      
            'status.required' => 'vui lòng nhập trạng thái ',      
            'customer_id.required' => 'vui lòng nhập tên khách hàng ',      
               
        ];
    }
}
