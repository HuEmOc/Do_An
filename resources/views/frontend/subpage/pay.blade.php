@extends('frontend.master')
@section('title','Thanh toán đơn hàng')
@section('content')
    <form method="post" action="">
        {!! csrf_field() !!}
        <div context="checkout" class="container">
            <div class="main">
                <div class="wrap clearfix">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group m0">
                                <h2>
                                    <label class="control-label">THÔNG TIN MUA HÀNG</label>
                                </h2>
                            </div>
                            @if (Auth::guest())
                                <div class="form-group"><a href="dang-ky.html">Đăng ký tài khoản mua hàng</a> | <a
                                            href="{{route('login')}}">Đăng nhập </a></div>
                                <hr class="divider">
                                <div class="form-group">
                                    <input name="txtEmail" class="form-control txtEmail" value="{!! old('txtEmail') !!}"
                                           placeholder="Vui lòng nhập Email">
                                    <div class="help-block with-errors"><?php echo $errors->first('txtEmail'); ?></div>
                                </div>
                                <div class="billing">
                                    <div bind-show="billing_expand">
                                        <div class="form-group">
                                            <input name="txtName" class="form-control txtName"
                                                   value="{!! old('txtName') !!}" placeholder="Họ và tên">
                                            <div class="help-block with-errors"><?php echo $errors->first('txtName'); ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input name="txtPhone" class="form-control txtPhone"
                                                   value="{!! old('txtPhone') !!}" placeholder="Số điện thoại">
                                            <div class="help-block with-errors"><?php echo $errors->first('txtPhone'); ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input name="txtAddress" class="form-control" value="{!! old('txtAddress') !!}"
                                                   placeholder="Địa chỉ">
                                            <div class="help-block with-errors"><?php echo $errors->first('txtAddress'); ?></div>
                                        </div>
                                        <hr class="divider">
                                    </div>
                                </div>
                                <div bind-show="otherAddress" class="shipping hide">
                                    <div class="form-group"><a class="underline-none" href="javascript:void(0)"> Thông tin
                                            nhận hàng<span class="hide"></span> </a></div>
                                </div>
                            @else
                                <div class="form-group">
                                    <input name="txtEmail" class="form-control txtEmail disabled" value="{!! old('txtEmail', Auth::user()->email) !!}"
                                           placeholder="Vui lòng nhập Email" disabled>
                                    <div class="help-block with-errors"><?php echo $errors->first('txtEmail'); ?></div>
                                </div>
                                <div class="billing">
                                    <div bind-show="billing_expand">
                                        <div class="form-group">
                                            <input name="txtName" class="form-control txtName disabled"
                                                   value="{!! old('txtName', Auth::user()->name) !!}" placeholder="Họ và tên" disabled>
                                            <div class="help-block with-errors"><?php echo $errors->first('txtName'); ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input name="txtPhone" class="form-control txtPhone disabled"
                                                   value="{!! old('txtPhone', Auth::user()->phone) !!}" placeholder="Số điện thoại" disabled>
                                            <div class="help-block with-errors"><?php echo $errors->first('txtPhone'); ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input name="txtAddress" class="form-control disabled" value="{!! old('txtAddress', Auth::user()->address) !!}"
                                                   placeholder="Địa chỉ" disabled>
                                            <div class="help-block with-errors"><?php echo $errors->first('txtAddress'); ?></div>
                                        </div>
                                        <hr class="divider">
                                    </div>
                                </div>
                                <button class="btn btn-primary col-md-12" id="editinfo">SỬA</button>

                                <script type="text/javascript">
                                    $(document).on('click', '#editinfo', function () {
                                        editInfo(this);
                                    });
                                    function editInfo (element) {
                                        element.toggleClass('btn-primary btn-danger');
                                        if (element.hasClass('btn-danger')) {
                                            element.text('OK');
                                            isDisabled = false;
                                        } else {
                                            element.text('SỬA');
                                            isDisabled = true;
                                        }
                                        $('.disabled').prop('disabled', isDisabled);
                                    }
                                </script>
                            @endif
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="shipping-method">
                                <div class="form-group">
                                    <h2>
                                        <label class="control-label">VẬN CHUYỂN</label>
                                    </h2>
                                </div>
                                <div class="form-group">
                                    <select name="value_order" class="form-control">
                                        <option value="40000">Giao hàng tận nơi - Miễn phí KV Xuaan Thuyr</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="order-summary order-summary--custom-background-color ">
                                <div class="order-summary-header">
                                    <h2>
                                        <label class="control-label">ĐƠN HÀNG</label>
                                    </h2>
                                </div>
                                <div class="summary-body  summary-section">
                                    <div class="summary-product-list">
                                        <ul class="product-list">
                                            <?php $subtotal = 0;?>
                                            @foreach($pays as $pay)
                                                <li class="product product-has-image clearfix"
                                                    style="margin-bottom:10px;">
                                                    @if (!$pay->options->isEmpty())
                                                        <img class="pull-left product-image" width="30"
                                                             style="margin-right:5px;" width="40"
                                                             src="{!! asset('/Image_frontend/phone/'.$pay->options->cart->image)!!} ">
                                                    @endif
                                                    <div class="product-info pull-left">
                                                        <span class="product-info-name">
                                                            <span style="font-size:10px">{!! $pay->name !!}</span>
                                                            <span style="color:#C00; padding:0px 5px;"> X </span> {!! $pay->qty !!}
                                                        </span>
                                                    </div>
                                                    <span class="product-price pull-right">
                                                        <?php echo number_format($pay->total, 0, ',', '.') ?> đ
                                                    </span>
                                                </li>
                                                <?php $subtotal += $pay->total; ?>
                                            @endforeach
                                            <hr/>
                                        </ul>

                                        <ul>
                                            <li class="product product-has-image clearfix" style="margin-bottom:10px;">
                                                Tổng cộng:
                                                <strong class="product-price pull-right" style="color:#3C0">
                                                    <input type="hidden" name="total_price" value="{{$subtotal}}">
                                                    <?php echo number_format($subtotal, 0, ',', '.') ?>đ
                                                </strong>
                                            </li>
                                        </ul>


                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    @if(Cart::count() > 0)
                                        <button class="btn btn-primary col-md-12 order-send" name=""
                                                type="submit" style="cursor: pointer;">ĐẶT HÀNG
                                        </button>
                                    @endif
                                </div>
                                <div class="form-group has-error">
                                    <div class="help-block ">
                                        <ul class="list-unstyled">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop