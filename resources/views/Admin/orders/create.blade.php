@include('message')
@extends('layouts.admin')

@section('title')
    Thêm mới đơn hàng
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

                    <form action="{{ route('orders.store') }}" method="POST" role="form">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="category_id">Tên khách hàng</label>
                                <select name="customer_id" class="form-control">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer['id'] }}">{{ $customer['firstName']}} {{$customer['lastName'] }}</option>
                                    @endforeach
                                </select>
                                {{-- {{ $errors->default->first('customer_id') }} --}}
                            </div>

                            <div class="form-group">
                                <label for="name">Ngày đặt hàng</label>
                                <input type="date" class="form-control" id="name" name="orderDate"
                                    value="{{ old('orderDate') }}">
                                {{ $errors->default->first('orderDate') }}
                            </div>

                            <div class="form-group">
                                <label for="shippedDate">Ngày giao hàng</label>
                                <input type="date" class="form-control" id="name" name="shippedDate"
                                    value="{{ old('shippedDate') }}">
                                {{ $errors->default->first('shippedDate') }}

                            </div>

                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <input type="text" class="form-control" id="name" name="status"
                                    value="{{ old('status') }}">
                                {{ $errors->default->first('status') }}
                            </div>

                            <div class="form-group">
                                <label for="status">Bình luận</label>
                                <input type="text" class="form-control" id="name" name="comments"
                                    value="{{ old('comments') }}">
                           
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('orders.index') }}" class="btn btn-primary"> Trở về </a>

                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
