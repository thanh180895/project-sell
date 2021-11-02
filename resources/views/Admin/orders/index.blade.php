@extends('layouts/admin')

@section('title')
    Quản lý đơn hàng
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  @if(Session::has('success'))
                  <div class="alert alert-success ">
                     {{ Session::get('success')}}
                  </div>
                  @endif
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 10px">id_Đơn Hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Ngày giao hàng</th>
                                <th>Trạng thái</th>
                                <th>Bình luận</th>
                                <th>Hành Động</th>
                            </tr>
                            @foreach ($items as $item)
                        {{-- {{dd($item->customers->toArray())}} --}}
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->customer['firstName']}} {{$item->customer['lastName']}}</td>
                                    <td>{{ $item->orderDate }}</td>
                                    <td>{{ $item->shippedDate }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->comments }}</td>
                                    <td>
                                        <div class="row">
                                            <div class='col-sm-2'>
                                                <a href="{{ route('orders.edit', $item->id) }}"
                                                    class="active styling -edit" ui-tonggle-class="">
                                                    <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                            </div>
                                            <div class="col-sm-4">
                                                <form id="delete_form"
                                                    action="{{ route('orders.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method ('DELETE')
                                                    <button type="submit" class="active styling-edit" ui-toggle-class=""
                                                        onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                                        <i class="fa fa-times text-danger text"></i>
                                                    </button>
                                                </form>
                                            </div>

                                            {{-- <a href="{{ route('categories.destroy',$item->id) }}" class="badge bg-red" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a> --}}

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
