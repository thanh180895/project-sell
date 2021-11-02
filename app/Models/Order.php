<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'orders';
    public $timestamps = false;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function get_orderdetails (){
        return $this->hasMany(Orderdetail::class);
    }
}  
