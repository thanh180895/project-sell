<?php

use App\Http\Controllers\CartController;
use \App\Http\Controllers\Admin\DashboardController;
use \App\Http\Controllers\Admin\CategoriesController;
use \App\Http\Controllers\Admin\ProductsController; 
use \App\Http\Controllers\Admin\CustomersController;
use \App\Http\Controllers\Admin\OrdersController;
use \App\Http\Controllers\Admin\OrderdetailsController;
use App\Http\Controllers\Admin\UsersController;
// use Illuminate\Support\Facades\Auth;
// use \App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use \App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Admin
Route::group(['middleware'=>'auth','prefix' => 'admin'], function()
{
//     Route::get('/login', function (){
//         return view('layouts.login');
//     });
    Route::resource('/dashboard',DashboardController::class);
    Route::resource('/categories',CategoriesController::class);
    Route::resource('/products',ProductsController::class);
    Route::resource('/customers',CustomersController::class);
    Route::resource('/orders',OrdersController::class);
    Route::resource('/orderdetails',OrderdetailsController::class);
    Route::resource('/users',UsersController::class);
});
// Auth::routes();
// Route::get('/admin/dashboard',[HomeController::class,'index']);

Route::get('admin/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/login',[LoginController::class,'postLogin'])->name('postLogin');


//Page

Route::get('/home',[IndexController::class,'index']);
Route::get('/login',[IndexController::class,'login']);
Route::get('/danh-muc-san-pham/{id}',[CategoriesController::class,'show_category']);
Route::get('/chi-tiet-san-pham/{id}',[ProductsController::class,'details_product']);
Route::get('/save-cart',[CartController::class,'save_cart']);


// Route::get('/detail-product',[IndexController::class,'detail_product']);

