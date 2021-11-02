<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orderdetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
