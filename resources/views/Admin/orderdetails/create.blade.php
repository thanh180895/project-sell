{{-- @include('message') --}}
@extends('layouts.admin')

@section('title')
    Tạo mới
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

                    <form action="{{ route('categories.store') }}" method="POST" role="form">
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
                                <label for="description">Tên sản phẩm</label>
                                <textarea name="category_desc" id="description" class="form-control"
                                    value="{{ old('category_desc') }}"></textarea>
                                {{ $errors->default->first('category_desc') }}
                            </div>

                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select name="category_status" class="form-select" id="inputGroupSelect02">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-primary"> Trở về </a>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
