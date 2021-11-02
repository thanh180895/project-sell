<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function get_orderdetails (){
        return $this->hasMany(Orderdetail::class);
    }
}
