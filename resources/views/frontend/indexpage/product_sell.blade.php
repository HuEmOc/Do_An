
<section class="section section-hot-new">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="block">
                    <h2 class="block-title">Sell Phone</h2>
                    <div class="block-content">
                        <div class="owl-product owl-carousel">
                        @foreach ($product_sells as $product_sell)
                            <!-- sản phẩm -->
                                <div class="owl-item" style="width: 210px;" data-id="{!! $product_sell->product->id !!}">
                                    <div class="item">
                                        <div class="product-item">
                                            <div class="product-item-image">
                                                <a href="{!! url('/'.$product_sell->product->alias) !!}">
                                                <img class="img-responsive" src="{!! asset('/Image_frontend/phone/'.$product_sell->product->image) !!}" ></a>
                                            </div>
                                            <a class="product-item-name" href="{!! url('/'.$product_sell->product->alias) !!}">{!! $product_sell->product->name !!}</a>
                                            <div>
                                                @if ($product_sell->product->sale_id != 0)
                                                    <p class="product-item-price">
                                                        <?php echo number_format($product_sell->product->price * (100- $product_sell->product->relation_sale->percent)/100,0,',', '.') ?>đ
                                                        <span class="product-item-price-sale">
                                                                {{'-'.$product_sell->product->relation_sale->percent.'%'}}
                                                            </span>
                                                        <span class="price-regular">
                                                                 <?php echo number_format($product_sell->product->price, 0, ',', '.') ?> đ
                                                            </span>
                                                    </p>
                                                @else
                                                    <p class="product-item-price"><?php echo number_format($product_sell->product->price,0,',','.') ?>đ </p>
                                                @endif
                                                <a class="product-item-cart add_to_cart" onclick="myShow(this)" data-id="{!! $product_sell->product->id !!}"><span></span>Add to cart</a>
                                            </div>

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
