

<style>

    .dropdown-submenu:hover>a {
        background: red;
    }
</style>



<!-- header -->
<div class="notifyjs-corner" style="top: 0px; right: 0px; display: none">
    <div class="notifyjs-wrapper notifyjs-hidable">
        <div class="notifyjs-arrow" style=""></div>
        <div class="notifyjs-container">
            <div class="notifyjs-bootstrap-base notifyjs-bootstrap-success"> <span data-notify-text="">Sản phẩm đã được thêm vào giỏ hàng</span> </div>
        </div>
    </div>
</div>

<header id="header" class="">
    <!-- header top -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="pull-right">
                        <nav class="header-top-nav">
                            <ul>
                                <li><a href="{{ url('/register')}}"><i class="fa fa-user"></i> Register</a></li>
                                <li><a href="{{ url('/login')}}"><i class="fa fa-sign-out"></i>Login</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header top -->
    <!-- herder bottom -->
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 header-logo"><img src="{!! asset('/upload/logoweb/logo-telephone-store.jpg') !!}" style="width:275px;height:50px" /> </div>
                <div class="col-xs-4 nav-mobile-button"> <a href="#nav-mobile"><i class="fa fa-bars fa-2x"></i></a> </div>
                <div class="col-md-5 col-sm-8 hidden-xs header-services ">
                    <ul class="row">
                        <li class="col-md-4 col-sm-4"> <a href="#" class="title"><i class="fa fa-cube"></i>Giao hàng free</a> </li>
                        <li class="col-md-4 col-sm-4"> <a href="#" class="title"><i class="fa fa-exchange"></i>Đổi trả free</a> </li>
                        <li class="col-md-4 col-sm-4"> <a href="#" class="title"><i class="fa fa-life-ring"></i>Hỗ trợ 24/7</a> </li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-8 header-cart">
                    <div class="cart-mini pull-right">
                        <div class="cart-mini-button">
                           <a href="{!! url('cart') !!}"><span class="item_cart" style="color: white"><div id="total_product">0</div> Product</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end  header bottom -->
    <!-- header search menu -->
    <div class="header-nav-search">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9 hidden-xs">
                    <nav class="header-nav">
                        <ul>
                            <li class="@yield('trangchu')"><a href="{!! url('/phone') !!}">Home </a> </li>
                            <li> <a href="#">Introduce</a> </li>
                           <!-- <li class="@yield('sanpham')"> <a href="{!! url('san-pham') !!}">Product<i class="fa fa-caret-down"></i></a>-->
                            <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#">Product<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu"><a href="#">Apple</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Iphone 7&7 Plus</a>
                                            </li>
                                            <li><a href="#">Iphone 6s&6s Plus</a>
                                            </li>
                                            <li><a href="#">Iphone 6&6 Plus</a>
                                            </li>
                                            <li><a href="#">Iphone SE</a>
                                            </li>
                                            <li><a href="#">Iphone 5s</a>
                                            </li>
                                            <li><a href="#">iPod</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu"> <a href="#">Samsung</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Samsung Galaxy Note</a>
                                            </li>
                                            <li><a href="#">Samsung Galaxy S</a>
                                            </li>
                                            <li><a href="#">Samsung Galaxy J</a>
                                            </li>
                                            <li><a href="#">Samsung Galaxy A</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="dropdown-submenu"> <a href="#">Hãng khác</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Lenovo</a>
                                            </li>
                                            <li><a href="#">Sony</a>
                                            </li>
                                            <li><a href="#">HTC</a>
                                            </li>
                                            <li><a href="#">Asus</a>
                                            </li>
                                            <li><a href="#">Xiaomi</a>
                                            </li>
                                            <li><a href="#">Nokia</a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            </li>
                        </ul>
                        <ul>
                            <li class="@yield('tintuc')"><a href="http://vnexpress.net/"> News </a> </li>
                            <li class="@yield('lienhe')"><a> Contact</a> </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="header-search">
                        <form action="#" method="get">
                            <a href="{{url('home')}}"><input type="text" name="search" class="hs-text" placeholder="Search"></a>
                            <button type="submit" class="hs-submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header search menu -->

</header>

<!-- end header -->
