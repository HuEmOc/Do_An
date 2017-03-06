

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
                        <li class="col-md-6 col-sm-4"> <a href="#" class="title"><i class="fa fa-cube"></i>Free ship</a> </li>
                        <li class="col-md-6 col-sm-4"> <a href="#" class="title"><i class="fa fa-life-ring"></i>Support 24/7</a> </li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-8 header-cart">
                    <div class="cart-mini pull-right">
                        <div class="cart-mini-button">
                           <a href="{!! url('cart') !!}"><span class="item_cart" style="color: white" id="total_product">0 Product</span></a>
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
                            <li class="@yield('sanpham')"> <a href="{!! url('frontend_categories') !!}">Product<i class="fa fa-caret-down"></i></a>
                                <ul>
                                    <?php $menus = DB::table('categories')->select('id','name','alias','parent_id')->where('parent_id',0)->orderBy('id','DESC')->get(); ?>
                                    @foreach ($menus as $menu)
                                        <li><a href="{!! url('danh-muc',[$menu->alias]) !!}">{!! $menu->name !!}</a>
                                            <?php $parent = DB::table('categories')->select('id','name','alias','parent_id')->where('parent_id',$menu->id)->orderBy('id','DESC')->get(); ?>
                                            <ul>
                                                @foreach($parent as $parents)
                                                    <li><a href="{!! url('category',[$parents->alias]) !!}"><?php echo $parents->name ?></a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>

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
