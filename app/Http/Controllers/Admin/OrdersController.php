<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Order::with('customer')->get();
        $params = [
            'items' => $items
        ];
        return view('admin.orders.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $params = [
            'customers' => $customers,
        ];
        return view('admin.orders.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        
        $order              = new Order();
        $order->customer_id = $request->customer_id;
        $order->orderDate   = $request->orderDate;
        $order->shippedDate = $request->shippedDate;
        $order->status      = $request->status;
        $order->comments    = $request->comments;

        $order->save();
        return redirect()->route('orders.index')->with('success','Tạo đơn hàng thành công');
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
        $customers = Customer::all();
        $item      = Order::find($id);

        $params = [
            'customers' => $customers,
            'item' => $item
        ];
        return view('admin.orders.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $order              = Order::find($id);
        $order->customer_id = $request->customer_id;
        $order->orderDate   = $request->orderDate;
        $order->shippedDate = $request->shippedDate;
        $order->status      = $request->status;
        $order->comments    = $request->comments;

        $order->save(); 
        return redirect()->route('orders.index')->with('success','Cập nhật đơn hàng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Order::find($id);
        $item->delete();

        return redirect()->route('orders.index')->with('success','Xóa đơn hàng thành công! ');
    }
}
