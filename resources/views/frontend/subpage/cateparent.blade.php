@extends('frontend.master')
@section('sanpham', 'active')
@section('title','Danh mục sách các loại')
@section('content')
    <!-- hien tiêu đề -->
    <section class="content-slide">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{!! asset('/') !!}">Trang chủ</a></li>
                        <li class="active"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end tiêu đề -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3 sidebar">
                    <div class="sb-block">
                        <div class="sb-block-title">
                            <h2>Danh mục sản phẩm</h2>
                        </div>
                        <div class="sb-block-content nav-category">
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{!! url('list_categories',[$category->alias]) !!}">{!! $category->name !!}</a>
                                        @foreach($category->child as $parent)
                                            <a href="{{url('list_categories',[$parent->alias])}}">&nbsp;&nbsp;&raquo;&nbsp;&nbsp;{{$parent->name}}</a>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="sb-block">
                        <a href="#">
                            <img class="img-responsive" src="{!! asset('/images/banner_category_sidebar.png') !!}"></a>
                    </div>
                    <div class="sb-block">
                        <div class="sb-block-title">
                            <h2>Sản phẩm bán chạy</h2>
                        </div>
                        <div class="sb-block-content sb-products">
                            <ul>
                            @foreach ($product_sells as $product_sell)
                                <!-- sản phẩm -->
                                    <div class="owl-item" style="width: 210px;"
                                         data-id="{!! $product_sell->product->id !!}">
                                        <div class="item">
                                            <div class="product-item">
                                                <div class="product-item-image">
                                                    <a href="{!! url('/'.$product_sell->product->alias) !!}">
                                                        <img class="img-responsive"
                                                             src="{!! asset('/Image_frontend/phone/'.$product_sell->product->image) !!}"></a>
                                                </div>
                                                <a class="product-item-name"
                                                   href="{!! url('/'.$product_sell->product->alias) !!}">{!! $product_sell->product->name !!}</a>
                                                <div>

                                                    @if (!is_null($product_sell->product->sale_id))
                                                        <p class="product-item-price">
                                                            <?php echo number_format($product_sell->product->price * (100 - $product_sell->product->relation_sale->percent) / 100, 0, ',', '.') ?>
                                                            đ
                                                            <span class="product-item-price-sale">
                                                                {{'-'.$product_sell->product->relation_sale->percent.'%'}}
                                                            </span>
                                                            <span class="price-regular">
                                                                 <?php echo number_format($product_sell->product->price, 0, ',', '.') ?>
                                                                đ
                                                            </span>
                                                        </p>
                                                    @else
                                                        <p class="product-item-price"><?php echo number_format($product_sell->product->price, 0, ',', '.') ?>
                                                            đ </p>
                                                    @endif
                                                    <a class="product-item-cart add_to_cart" onclick="myShow(this)"
                                                       data-id="{!! $product_sell->product->id !!}"><span></span>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- end sản phẩm -->
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 content-category">
                    <div class="cc-products">
                        <div class="row">
                            <!-- sản phẩm category -->
                            @foreach ($products as $product)
                                <div class="col-md-4 col-sm-6 ">
                                    <div class="product-item-category">
                                        <div class="product-item-image">
                                            <a href="{!! url('/'.$product->alias) !!}">
                                                <img class="img-responsive"
                                                     src="{!! asset('/Image_frontend/phone/'.$product->image) !!}"> </a>
                                        </div>
                                        <a class="product-item-name"
                                           href="{!! url('/'.$product->alias) !!}">{!! $product->name !!}</a>
                                        <div>
                                            @if ($product->sale_id != 0)
                                                <p class="product-item-price">
                                                    <?php echo number_format($product->price * (100- $product->relation_sale->percent)/100,0,',', '.') ?>đ
                                                    <span class="product-item-price-sale">
                                                                {{'-'.$product->relation_sale->percent.'%'}}
                                                            </span>
                                                    <span class="price-regular">
                                                                 <?php echo number_format($product->price, 0, ',', '.') ?> đ
                                                            </span>
                                                </p>
                                            @else
                                                <p class="product-item-price"><?php echo number_format($product->price,0,',','.') ?>đ </p>
                                            @endif
                                            <a class="product-item-cart add_to_cart" onclick="myShow(this)"
                                               data-id="{!! $product->id !!}"><span></span>Thêm vào giỏ</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- end sản phẩm category -->
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
@stop