@extends('layouts.admin')

@section('title')
    Chỉnh sửa sản phẩm
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

                    <form action="{{ route('products.update', $item->id) }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                                {{ $errors->default->first('name') }}
                            </div>

                            <div class="form-group">
                                <label for="category_id">Chọn danh mục</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Mô Tả</label>
                                <textarea style="resize: none" rows="5" name="description" id="description"
                                    class="form-control">{{ $item->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="status">Giá</label>
                                <input type="text" class="form-control" id="name" name="price"
                                    value="{{ $item->price }}">
                                {{ $errors->default->first('price') }}
                            </div>

                            <div class="form-group">
                                <label for="inputFileName">Hình ảnh</label>
                                <input type="file" class="form-control-file" id="image" name="image" >
                                <img src="{{ asset('/public/stogare/images/' . $item->image) }}" alt="" style="width: 150px" >
                            </div>
                            <style type="text/css"> 
                                p.cofile {
                                    text-align: left;
                                    font-size: 16px;
                                    margin: 5px 0;
                                }
                            </style>
                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select name="status" class="form-select" id="inputGroupSelect02">
                                    @if ($item->status == 0)
                                        <option selected value="0">Hiển thị<table></table>
                                        </option>
                                        <option value="1">Ẩn</option>
                                    @else($item->status==1)
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
                            <a href="{{ route('products.index') }}" class="btn btn-primary">Trở về</a>

                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
