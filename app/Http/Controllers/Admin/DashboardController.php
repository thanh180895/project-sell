<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function index(){
      
        $params = [
            'total_orders'      => 100,
            'total_rates'       => 20,
            'total_users'       => 10,
            'total_visitors'    => 50,
        ];
        return view('admin.dashboard.dashboard',$params);
    }
    
}
