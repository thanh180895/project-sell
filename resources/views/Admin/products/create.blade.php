@extends('layouts.admin')

@section('title')
    Tạo mới sản phẩm
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

                    <form action="{{ route('products.store') }}" method="POST" role="form" enctype="multipart/form-data">

                        <div class="box-body">

                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
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
                                    class="form-control">{{ old('description') }}</textarea>
                                {{ $errors->default->first('description') }}
                            </div>

                            <div class="form-group">
                                <label for="status">Giá</label>
                                <input type="text" class="form-control" id="name" name="price"
                                    value="{{ old('price') }}">
                                {{ $errors->default->first('price') }}
                            </div>

                            <div class="form-group">
                                <label for="inputFileName">Hình ảnh</label>
                                <input type="file" class="form-control-file" id="image" name="image"
                                    value="{{ old('image') }}">
                                {{ $errors->default->first('image') }}
                            </div>

                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select name="status" class="form-select" id="inputGroupSelect02">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                            </div>


                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('products.index') }}" class="btn btn-primary"> Trở về </a>

                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
