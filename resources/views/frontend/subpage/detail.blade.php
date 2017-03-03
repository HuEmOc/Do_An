@extends('frontend.master')
@section('title','chitietsanpham')
@section('content')
    <!-- end header -->
    <section class="content-slide">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>Trang chủ</li>
                        <li><a href=""></a></li>
                        <li class="active"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9 content-product">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="content-product-image">
                                <div class="text-center elevate-image"> <span class="product-item-sale"></span> <img id="zoom" class="img-responsive" src="" data-zoom=""> </div>
                                <div id="gallery_01">
                                    <div id="owl-product">
                                        <div class="item"> <a href="" data-zoom-image="" data-image=""><img id="" src=""></a> </div>
                                            <div class="item">
                                                <a href="" data-zoom-image="" data-image="">
                                                    <img id="zoom" src="">
                                                </a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h1 class="product-name"></h1>
                            <p class="product-availability">Tình trạng: <span> Còn hàng </span></p>
                            <p class="product-price"></p>
                            <p class="product-description">
                            </p>
                            <div class="form-add-cart">
                                <label for="">Số lượng</label>
                                <div class="fac-quantity">
                                    <input type="text" value="1" class="quantity" name="quantity" disabled="disabled">
                                </div>
                                <a href="" class="product-item-cart add_to_cart" data-id=""><span></span>Thêm vào giỏ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 sidebar">
                    <div class="sb-block">
                        <div class="sb-block-title">
                            <h2>Thông số kĩ thuật</h2>
                        </div>
                        <div class="sb-block-content sb-products">
                            a<br>
                            a  a<br>
                            a  a<br>  a<br>
                            a  a<br>
                            a  a<br>
                            a  a<br>
                            a  a<br>
                            a<br>
                            a<br><br>
                            a a  a<br>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 content-product-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô tả sản phẩm</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Đánh giá</a></li>          </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">

                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <!-- -->
                            <ul>

                                    <li style="padding:5px"><strong></strong> đã cho <span style="color:red"></span> sao
                                        <ul>
                                            <li style="padding-top:8px"></li>
                                        </ul>
                                    </li>

                                <div style="font-size:20px">Tổng số sao: <span style="color:red">
                </span> sao</div>
                            </ul>
                            <!-- -->
                            <form action="" id="contact" method="post">

                                <div class="col-md-6">
                                    Chọn số sao:
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i == 5)
                                            <input type="radio" name="danhgia" value="{!! $i !!}" title="{!! $i !!} sao" checked="checked"> {!! $i !!} sao
                                        @else
                                            <input type="radio" name="danhgia" value="{!! $i !!}" title="{!! $i !!} sao"> {!! $i !!} sao
                                        @endif
                                    @endfor
                                    <div class="form-contact"  style="margin-top:5px;">
                                        <button type="button" class="comment-submit send_danh_gia">Gửi</button>
                                    </div>
                                </div>
                            </form><span class="guidulieu"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@stop