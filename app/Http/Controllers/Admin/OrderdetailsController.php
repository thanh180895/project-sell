<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderdetailRequest;
use App\Models\Orderdetail;
use App\Models\Order;
use App\Models\Product;

class OrderdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items  = Orderdetail::with('product')->get();
        $items  = Orderdetail::with('order')->get();
        $params = [
            'items' => $items
        ];  
        return view('admin.orderdetails.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all();
        $products = Product::all();
        $params = [
            'orders'=> $orders,
            'products' =>$products
        ];
        return view('admin.Orderdetails.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderdetailRequest $request)
    {
        $orderdetail = new Orderdetail();
        $orderdetail->order_id = $request->order_id;
        $orderdetail->product_id = $request->product_id;
        $orderdetail->quantityOrdered = $request->quantityOrdered;
        $orderdetail->priceEach = $request->priceEach;
        $orderdetail->totalOrder = $request->totalOrder;
        $orderdetail->save();

        return redirect()->route('orderdetails.index')->with('success','');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = Order::all();
        $products = Product::all();
        $item = Orderdetail::find($id);
        $params = [
            'orders' => $orders,
            'products' => $products,
            'item' => $item
        ];
        return view('admin.orderdetails.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderdetailRequest $request, $id)
    {
        $orderdetail = Orderdetail::find($id);
        $orderdetail->order_id = $request->order_id;
        $orderdetail->product_id = $request->product_id;
        $orderdetail->quantityOrdered = $request->quantityOrdered;
        $orderdetail->priceEach = $request->priceEach;
        $orderdetail->totalOrder = $request->totalOrder;
        $orderdetail->save();
        
        return redirect()->route('orderdetails.index')->with('success','Chỉnh sửa thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $item = Orderdetail::find($id);
       $item->delete();
       return redirect()->route('orderdetails.index')->with('success','Xóa thành công'); 
    }
}
