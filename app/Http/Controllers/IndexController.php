<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {   
        $categories = Category::orderBy('id','DESC')->where('category_status',0)->get();    
        $products = Product::orderBy('id','DESC')->where('status',0)->get();
        return view('pages.home')->with(compact('categories', 'products')); 
    }
    public function login()
    {
        return view('pages.login');
    }
}
