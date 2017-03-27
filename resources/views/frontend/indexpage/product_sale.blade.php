<section class="section section-hot-new">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="block">
                    <h2 class="block-title">Sản phẩm giảm giá</h2>
                    <div class="block-content">
                        <div class="owl-product owl-carousel owl-theme">
                        @foreach ($product_sales as $product_sale)

                            <!-- hien sản phẩm -->
                                <div class="owl-item" style="width: 210px;">
                                    <div class="item">
                                        <div class="product-item">
                                            <div class="product-item-image">
                                                <a href="{!! url('/'.$product_sale->alias) !!}">
                                                    <img class="img-responsive" src="{!! asset('/Image_frontend/phone/'.$product_sale->image) !!}">
                                                </a>
                                            </div>
                                            <a class="product-item-name"
                                               href="{!! url('/'.$product_sale->alias) !!}">{!! $product_sale->name !!}
                                            </a>

                                            <div>
                                                @if ($product_sale->sale_id != 0)
                                                    <p class="product-item-price">
                                                        <?php echo number_format($product_sale->price * (100- $product_sale->percent)/100,0,',', '.') ?>đ
                                                        <span class="product-item-price-sale">
                                                                {{'-'.$product_sale->percent.'%'}}
                                                            </span>
                                                        <span class="price-regular">
                                                                 <?php echo number_format($product_sale->price, 0, ',', '.') ?> đ
                                                            </span>
                                                    </p>
                                                @else
                                                    <p class="product-item-price"><?php echo number_format($product_sale->price,0,',','.') ?>đ </p>
                                                @endif
                                                <a class="product-item-cart add_to_cart" onclick="myShow(this)" data-id="{!! $product_sale->id !!}"><span></span>Thêm vào giỏ</a>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!-- end hien sản pham -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
