@include('message')
@extends('layouts.admin')

@section('title')
    Thêm mới khách hàng
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

                    <form action="{{ route('customers.store') }}" method="POST" role="form">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input type="text" class="form-control" id="firstName" name="firstName"
                                    value="{{ old('firstName') }}">
                                {{ $errors->default->first('firstName') }}
                            </div>

                            <div class="form-group">
                                <label for="name">Họ</label>
                                <input type="text" class="form-control" id="name" name="lastName"
                                    value="{{ old('lastName') }}">
                                {{ $errors->default->first('lastName') }}
                            </div>

                            <div class="form-group">
                                <label for="name">Điện thoại</label>
                                <input type="text" class="form-control" id="name" name="phone"
                                    value="{{ old('phone') }}">
                                {{ $errors->default->first('phone') }}
                            </div>
                            <div class="form-group">
                                <label for="name">Địa chỉ</label>
                                <input type="text" class="form-control" id="name" name="address"
                                    value="{{ old('address') }}">
                                {{ $errors->default->first('address') }}
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('customers.index') }}" class="btn btn-primary"> Trở về </a>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
