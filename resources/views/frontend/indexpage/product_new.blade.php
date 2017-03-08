
<section class="section section-hot-new">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="block">
                    <h2 class="block-title">New phone</h2>
                    <div class="block-content">
                        <div class="owl-product owl-carousel">
                        @foreach ($product_news as $product_new)
                            <!-- sản phẩm -->
                                <div class="owl-item" style="width: 210px;" data-id="{!! $product_new->id !!}">
                                    <div class="item">
                                        <div class="product-item">
                                            <div class="product-item-image">
                                                <a href="{!! url('detail') !!}">
                                                <img class="img-responsive" src="{!! asset('/Image_frontend/phone/'.$product_new->image) !!}" >
                                                </a>
                                            </div>
                                            <a class="product-item-name" href="{!! url('/'.$product_new->alias) !!}">{!! $product_new->name !!}</a>
                                            <div>
                                                @if($product_new->pricesale > 0)
                                                    <p class="product-item-price"> <?php echo number_format($product_new->price,0,',','.') ?>đ<span class="product-item-price-sale"> <?php echo number_format($product_new->pricesale,0,',','.') ?>đ </span> </p>
                                                @else
                                                    <p class="product-item-price"><?php echo number_format($product_new->price,0,',','.') ?>đ </p>
                                                @endif
                                                <a class="product-item-cart add_to_cart" onclick="myShow(this)" data-id="{!! $product_new->id !!}"><span></span>Thêm vào giỏ</a>
                                            </div>

                                            @if($product_new->pricesale > 0)
                                                <span class="product-item-sale"></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- end sản phẩm -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</section>
