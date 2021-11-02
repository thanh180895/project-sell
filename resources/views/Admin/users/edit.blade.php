{{-- @include('message') --}}
@extends('layouts.admin')
@section('title')
   Chỉnh sửa tài khoản Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{ route('users.update', $item->id) }}" method="POST" role="form">
                        @method('PUT')                     
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input type="text" class="form-control" id="name" name="name"
                                value="{{ $item->name }}">
                                {{ $errors->default->first('name') }}
                            </div>

                            <div class="form-group">
                                <label for="description">Email</label>
                                <input type="text" class="form-control" id="name" name="email"
                                value="{{ $item->email }}">
                                {{ $errors->default->first('email') }}
                            </div>
                            <div class="form-group">
                                <label for="description">Password</label>
                                <input type="text" class="form-control" id="name" name="password"
                                value="{{ $item->password }}">
                                {{ $errors->default->first('password') }}
                            </div>                      
                            <div class="form-group">
                                <label for="description">Chức vụ</label>
                                <input type="text" class="form-control" id="name" name="role"
                                value="{{ $item->role }}">
                                {{ $errors->default->first('role') }}
                            </div>            
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('users.index') }}" class="btn btn-primary"> Trở về </a>
                        </div>
                    </form>
                </div>
                <!-- /.box-body --> 
            </div>
        </div>
    </div>
@endsection
