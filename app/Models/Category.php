<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "id ","category_name","category_desc","category_status"
    ];

    protected $primaryKey = 'id';
    protected $table = 'categories';
    public $timestamps = true;

    public function get_products(){
        return $this->hasMany(Product::class);
    }
}
