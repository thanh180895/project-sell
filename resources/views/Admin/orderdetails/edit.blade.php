@include('message')
@extends('layouts.admin')

@section('title')
    Chỉnh sửa chi tiết đơn hàng
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('orderdetails.update', $item->id) }}" method="POST" role="form">
                        @method('PUT')
                        @csrf
                        <div class="box-body">          
                            <div class="form-group">
                                <label for="name">Order_id</label>
                                <select name="order_id" class="form-control">
                                    @foreach ($orders as $order)
                                        <option value="{{ $order['id'] }}">{{ $order['id'] }}</option>
                                    @endforeach
                                </select>
                                {{ $errors->default->first('order_id') }}
                            </div>
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <select name="product_id" class="form-control">
                                    @foreach ($products as $product)
                                        <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                                    @endforeach
                                </select>
                                {{ $errors->default->first('product_id') }}
                            </div>
                                        
                            <div class="form-group">
                                <label for="name">Giá mỗi sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="priceEach" value="{{ $item->priceEach }}">
                                {{ $errors->default->first('priceEach') }}
                            </div>
                            <div class="form-group">
                                <label for="name">Số lượng đã đặt</label>
                                <input type="text" class="form-control" id="name" name="quantityOrdered" value="{{ $item->quantityOrdered }}">
                                {{ $errors->default->first('quantityOrdered') }}
                            </div>
                            <div class="form-group">
                                <label for="name">Tổng tiền</label>
                                <input type="text" class="form-control" id="name" name="totalOrder" value="{{ $item->totalOrder }}">
                                {{ $errors->default->first('totalOrder') }}
                            </div>
                                

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('orderdetails.index') }}" class="btn btn-primary"> Trở về </a>

                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
