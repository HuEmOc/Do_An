
<section class="section section-hot-new">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="block">
                    <h2 class="block-title">Sản phẩm bán chạy</h2>
                    <div class="block-content">
                        <div class="owl-product owl-carousel">
                        @foreach ($product_sells as $product_sell)
                            <!-- sản phẩm -->
                                <div class="owl-item" style="width: 210px;" data-id="{!! $product_sell->id !!}">
                                    <div class="item">
                                        <div class="product-item">
                                            <div class="product-item-image"> <a href="{!! url('detail') !!}">
                                                    <img class="img-responsive" src="{!! asset('/upload/'.$product_sell->image) !!}" > </a> </div>
                                            <a class="product-item-name" href="{!! url('/'.$product_sell->alias) !!}">{!! $product_sell->name !!}</a>
                                            <div>
                                                @if($product_sell->pricesale > 0)
                                                    <p class="product-item-price"> <?php echo number_format($product_sell->price,0,',','.') ?>đ<span class="product-item-price-sale"> <?php echo number_format($product_sell->pricesale,0,',','.') ?>đ </span> </p>
                                                @else
                                                    <p class="product-item-price"><?php echo number_format($product_sell->price,0,',','.') ?>đ </p>
                                                @endif
                                                    <a class="product-item-cart add_to_cart" onclick="myShow(this)" data-id="{!! $product_sell->id !!}"><span></span>Thêm vào giỏ</a> </div>

                                            @if($product_sell->pricesale > 0)
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
