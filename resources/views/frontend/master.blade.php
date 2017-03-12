<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>@yield('title')</title>
    <meta content="<?php if (isset($keyword)) {
        echo $keyword;
    } ?>">
    <meta name="keywords" content="<?php if (isset($keyword)) {
        echo $keyword;
    } ?>">
    <meta name="description" content="<?php if (isset($description)) {
        echo $description;
    } ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ url('/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/frontend/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/frontend/css/css.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/frontend/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/frontend/css/jquery.mmenu.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/frontend/css/owl.carousel.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/frontend/css/style.css') }}"/>
    <script type="text/javascript" src="{{ url('/frontend/js/jquery-1.11.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/frontend/js/ajax_cart.js') }}"></script>
    <script type="text/javascript" src="{{ url('/frontend/js/danh_gia.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ngInfiniteScroll/1.3.0/ng-infinite-scroll.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-messages.js"></script>
    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

        .product-item-price-sale {
            background-color: #ff9601;
            color: #fff;
            display: inline-block;
            font-size: 12px;
            font-weight: 400;
            margin-left: 5px;
            margin-top: -2px;
            padding: 5px;
            vertical-align: middle;
            text-decoration: none;
        }
        .price-regular{
            font-size: 11px;
            color: #999;
            text-decoration: line-through;
            display: block;
            text-align: left;
            padding-top: 5px;
            padding-left: 40px;
        }
    </style>
</head>
<body>

@include('frontend.masterpage.menu_responsive')

<div class="page mm-page mm-slideout" id="mm-0">
    <div id="content">

    <!-- header -->
        @include('frontend.masterpage.header')
    <!--end header-->

    <!--content-->
        @yield('content')
    <!--end content-->

    <!--Button go to top-->
        <a id="yt-totop" href="#" title="Go to Top" style="display: block;"></a>
    <!--End butoon go to top-->

    <!--Send mail-->
        @include('frontend.masterpage.send_mail')
    <!--End Send mail-->
    </div>

    <!-- footer -->
        @include('frontend.masterpage.footer')
    <!-- end footer -->
</div>


<script type="text/javascript" src="{{ url('/frontend/js/option-selectors.js') }}"></script>
<script type="text/javascript" src="{{ url('/frontend/js/jquery.elevatezoom.js') }}"></script>
<script type="text/javascript" src="{{ url('/frontend/js/api.jquery.js') }}"></script>
<script type="text/javascript" src="{{ url('/frontend/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/frontend/js/jquery.mmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/frontend/js/main.js') }}"></script>
<script type="text/javascript" src="{{ url('/frontend/js/notify.js') }}"></script>
<script type="text/javascript" src="{{ url('/frontend/js/owl.carousel.min.js') }}"></script>
<script>
    var i;
    $.ajax({
        url: 'addtocart',
        success: function (data) {
            i = data;
            $('#total_product').html(i + ' Product');
        }
    });
    function myShow(element) {
        console.log($(element).attr('data-id'));
        $.ajax({
            url: 'addtocart/' + $(element).attr('data-id'),
            success: function (data) {
                $(".notifyjs-corner").fadeIn("fast").delay(3000).fadeOut();
                i = data;
                $('#total_product').html(i + ' Product');
            }
        });

    }
</script>

<script lang="javascript">(function() {var pname = ( (document.title !='')? document.title : document.querySelector('h1').innerHTML );var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async=1; ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=a2d037085697ad15098bbc2ceba5e42e&data=eyJzc29faWQiOjIxODY3NTgsImhhc2giOiJlNmVmOTQ2ZjhiNDI3YzYyNmFlOGFiMjlmZjJhMjg1YiJ9&pname='+pname;var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>

</body>
</html>