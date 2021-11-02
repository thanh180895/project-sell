@include('message')
@extends('layouts.admin')

@section('title')
    Chỉnh sửa danh mục sản phẩm
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

                    <form action="{{ route('categories.update', $item->id) }}" method="POST" role="form">
                        @method('PUT')
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input type="text" class="form-control" id="name" name="category_name"
                                    value="{{ $item->category_name }}">
                                {{ $errors->default->first('category_name') }}
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea style="resize: none" rows="5" name="category_desc" id="description"
                                    class="form-control"> {{ $item->category_desc }}</textarea>
                                {{ $errors->default->first('category_desc') }}
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select name="category_status" class="form-select" id="inputGroupSelect02">
                                    @if ($item->category_status == 0)
                                        <option selected value="0">Hiển thị<table></table>
                                        </option>
                                        <option value="1">Ẩn</option>
                                    @else ($item->category_status == 1)
                                        <option value="0">Hiển thị<table></table>
                                        </option>
                                        <option selected value="1">Ẩn</option>
                                    @endif
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
