@extends('pages.layout')
@section('content')

    {{-- @foreach ($products as $key => $value) --}}
    <div class="product-details">
        <!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{ asset('public/stogare/images/' . $products->image) }}" alt="" />
                <h3>ZOOM</h3>
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                {{-- <div class="carousel-inner">
                    <div class="item active">
                      <a href=""><img src="{{asset('public/frontend/images/similar1.jpg')}}" alt=""></a>
                      <a href=""><img src="{{asset('frontend/images/similar2.jpg')}}" alt=""></a>
                      <a href=""><img src="{{asset('frontend/images/similar3.jpg')}}" alt=""></a>
                    </div>
                    
                </div> --}}

                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information">
                <!--/product-information-->
                {{-- <img src="{{ asset('public/stogare/images/' . $products->image) }}" class="newarrival" alt="" /> --}}
                <h2>{{ $products->name }}</h2>
                <p>Mã ID: {{ $products->id }}</p>
                {{-- <img src="{{asset('frontend/images//rating.png')}}" alt="" /> --}}
                <form action="{{('/save-cart')}}" method="post">
                    {{csrf_field() }}
                <span>
                    <span>{{ number_format($products->price, 0, ',', '.') . ' VNĐ' }}</span>
                    <label>Số lượng:</label>
                    <input name="quantityOrdered" type="number" min="1" value="1" />
                    <input name="productid_hidden" type="hidden" min="1" value="{{ $products->id }}" />
                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Thêm giỏ hàng
                    </button>
                </span>
                <p><b>Tình trạng:</b> Còn hàng</p>
                <p><b>Điều kiện:</b> Mới 100%</p>
                <p><b>Thương hiệu:</b> T-SHOPPER</p>
                <p><b>Danh mục:</b> {{ $products->category->category_name }}</p>
                <a href=""><img src="{{ asset('/frontend/images//share.png" class="share img-responsive') }}"
                        alt="" /></a>
            </div>
            <!--/product-information-->
        </div>
    </div>
    <!--/product-details-->
    {{-- @endforeach --}}

    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">SẢN PHẨM LIÊN QUAN</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach ($related_product as $key => $related)
                        <div class="col-sm-4">
                            @if ($related->id !== $products->id)
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img height="220px"
                                                src="{{ asset('public/stogare/images/' . $related->image) }}" alt="" />
                                            <h2>{{ number_format($related->price, 0, ',', '.') . 'VNĐ' }} </h2>
                                            <p><a href="detail-product">{{ $related->name }}</a></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Thêm giỏ hàng </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach

                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--/recommended_items-->

@endsection
