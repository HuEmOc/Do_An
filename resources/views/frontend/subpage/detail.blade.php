@extends('frontend.master')
@section('title',$item_products->name)
@section('content')
    <!-- end header -->
    <section class="content-slide">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{!! url('/phone') !!}">Trang chủ</a></li>
                        <li>
                            <a href="{{url('/list_categories/' . $categories_products->alias)}}">{{$categories_products->name}}</a>
                        </li>
                        <li class="active">{!! $item_products->name !!}</li>
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
                                <div class="text-center elevate-image">
                                    @if($item_products->sale_id > 0)
                                        <span class="product-item-sale"></span>
                                    @endif
                                    <img id="zoom" class="img-responsive" style="height: 250px;"
                                         src="{!! asset('/Image_frontend/phone/'.$item_products->image) !!}"
                                         data-zoom=""></div>
                                <div id="gallery_01">
                                <!--<div class="item">
                                            <a href="javascript:void(0)"
                                               data-zoom-image="{!! asset('/Image_frontend/phone/'.$item_products->image) !!}"
                                               data-image="{!! asset('/Image_frontend/phone/'.$item_products->image) !!}">
                                                <img id="zoom"
                                                     src="{!! asset('/Image_frontend/phone/'.$item_products->image) !!}">
                                            </a>
                                        </div>
                                        -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h1 class="product-name">{{($item_products->name)}}</h1>
                            <p class="product-availability">Tình trạng: <span style="color: red;"> {{$status}} </span></p>

                            <p class="product-price">
                                @if($item_products->sale_id !== 0)
                                    <?php echo number_format($item_products->price * (100 - $item_products->relation_sale->percent) / 100, 0, ',', '.') ?>
                                    đ
                                    <span><?php echo number_format($item_products->price, 0, ',', '.') ?>đ </span>
                            </p>
                            @else
                                <p class="product-price"><?php echo number_format($item_products->price, 0, ',', '.') ?>
                                    đ</p>
                            @endif

                            @if (!is_null($item_products->introduce))
                                <div class="box-gift-product">
                                    {!! $item_products->introduce !!}
                                </div>
                            @endif

                            <div class="form-add-cart">
                                <label style="margin-top: 10px;" for="">Số lượng</label>
                                <div class="fac-quantity">
                                    <input type="number" value="1" class="quantity" name="quantity" style="padding-right: 0px">
                                    <a class="product-item-cart add_to_cart" style="cursor: pointer;display: inherit;" onclick="myShow(this, true)"
                                       data-id="{!! $item_products->id !!}"><span></span>Add to cart</a>
                                </div>
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
                            <ul class="parameter">
                                <li>
                                    <span>Screen:</span>
                                    <div>{{$item_products->screen}}</div>
                                </li>
                                <li>
                                    <span>Operation System:</span>
                                    <div>{{$item_products->operationSystem}}</div>
                                </li>
                                <li>
                                    <span>Cpu:</span>
                                    <div>{{$item_products->cpu}}</div>
                                </li>
                                <li>
                                    <span>Ram:</span>
                                    <div>{{$item_products->ram}}</div>
                                </li>
                                <li>
                                    <span>Camera:</span>
                                    <div>{{$item_products->camera}}</div>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 content-product-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                                  data-toggle="tab">Mô tả sản phẩm</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            {!!$item_products->description!!}
                        </div>
                    </div>
                </div>
                <div class="fb-comments" data-href="{{\Request::url()}}" data-width="100%" data-numposts="5" ></div>
            </div>
        </div>
    </section>
@stop