@include('message')
@extends('layouts.admin')

@section('title')
    Chỉnh sửa thông tin khách hàng
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

                    <form action="{{ route('customers.update', $item->id) }}" method="POST" role="form">
                        @method('PUT')
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="firstName">Tên</label>
                                <input type="text" class="form-control" id="name" name="firstName"
                                    value="{{ $item->firstName }}">
                                {{ $errors->default->first('firstName') }}
                            </div>

                            <div class="form-group">
                                <label for="lastName">Họ</label>
                                <input type="text" class="form-control" id="name" name="lastName"
                                    value="{{ $item->lastName }}">
                                {{ $errors->default->first('lastName') }}
                            </div>

                            <div class="form-group">
                                <label for="phone">Điện thoại</label>
                                <input type="text" class="form-control" id="name" name="phone"
                                    value="{{ $item->phone }}">
                                {{-- {{ $errors->default->first('phone') }} --}}
                            </div>

                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="name" name="address"
                                    value="{{ $item->address }}">
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
