@extends('layouts.admin')

@section('title')
    Danh sách sản phẩm
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success ">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="col-lg-8">
                    </div>
                    <div class="col-lg-4 d-flex">
                        <form  method="get" action={{ route('products.index') }} role="form">
                            <div class="col-sm-9">
                                <input type="search" class="form-control input-sm" name="search" placeholder="Search"
                                aria-controls="example1">
                            </div>
                            <button type="submit" class="btn btn-outline-light my-2 my-sm-0" value="Search"> Search</button>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Tên</th>
                            <th>Danh mục</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Hình ảnh</th>
                            <th>Trạng thái</th>
                            <th>Ngày Tạo</th>
                            <th>Hành Động</th>
                        </tr>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category['category_name'] }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <img src="{{ asset('public/stogare/images/' . $item->image) }}" alt=""
                                        style="width: 150px">
                                </td>
                                <td>
                                    @if ($item->status == 0)
                                        <span class='text text-success'>Hiển thị</span>
                                    @else
                                        <span class='text text-success'>Ẩn</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class='col-sm-3'>
                                            <a href="{{ route('products.edit', $item->id) }}" class="active styling -edit"
                                                ui-tonggle-class="">
                                                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                        </div>
                                        <div class="col-sm-4">
                                            <form id="delete_form" action="{{ route('products.destroy', $item->id) }}"
                                                method="post">
                                                @csrf
                                                @method ('DELETE')
                                                <button type="submit" class="active styling-edit" ui-toggle-class=""
                                                    onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                                    <i class="fa fa-times text-danger text"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class=" box-footer clearfix" style="float:right">
                    {{ $items->links() }}
                </div>
            </div>
            <!-- /.box-body -->

        </div>
    </div>
    </div>
@endsection
