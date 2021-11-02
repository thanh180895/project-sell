@extends('pages.layout')

@section('content')
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">TẤT CẢ SẢN PHẨM </h2>
        <div class="row">
            @foreach ($products as $key => $product)
            <a href="{{asset('/chi-tiet-san-pham/' . $product->id) }}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="productinfo text-center">
                            <img src="{{ asset('public/stogare/images/' . $product->image) }}" alt="" />
                            <h2><?php echo number_format($product['price'], 0, ',', '.') . 'VNĐ'; ?></h2>
                            <p><a href="detail-product">{{ $product->name }}</a></p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ
                                hàng</a>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <!--features_items-->
    </div>
@endsection
