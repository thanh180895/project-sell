@extends('layouts/admin')

@section('title')
    Quản lý tài khoản Admin
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
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Chức vụ</th>
                                <th>Ngày Tạo</th>
                                <th>Hành Động</th>
                            </tr>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role }}</td>                 
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <div class="row">
                                            <div class='col-sm-2'>
                                                <a href="{{ route('users.edit', $item->id) }}"
                                                    class="active styling -edit" ui-tonggle-class="">
                                                    <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                            </div>
                                            <div class="col-sm-4">
                                                <form id="delete_form"
                                                    action="{{ route('users.destroy', $item->id) }}" method="post">
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
                    {{-- <div class=" box-footer clearfix" style="float:right">
                        {{ $items->links() }}
                    </div> --}}
                </div>
                <!-- /.box-body -->

            </div>
        </div>
    </div>
@endsection
