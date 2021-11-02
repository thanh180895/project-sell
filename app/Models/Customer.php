<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        "id ","firstName","lastName","phone","address"
    ];

    protected $primaryKey = 'id';
    protected $table = 'customers';
    public $timestamps = true;

    public function get_orders(){
        return $this->hasMany(Order::class);
    }
}
