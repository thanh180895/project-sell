<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderdetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'quantityOrdered' => 'required',
            'priceEach' => 'required',
            'totalOrder' => 'required'
            
        ];
    }
    public function messages()
    {
        return [
            'quantityOrdered.required' => 'vui lòng nhập số lượng ',
            'priceEach.required' => 'vui lòng nhập giá sản phẩm',           
            'totalOrder.required' => 'vui lòng nhập tổng tiền ',           
        ];
    }
}
