@extends('frontend.master')
@section('title','Thế giới di động')
@section('trangchu', 'active')
@section('content')
    <!-- slide --- banner -->
    @include('frontend.indexpage.banner')
    <!-- end slide --- banner -->

    <!-- Product_new -->
    @include('frontend.indexpage.product_new')
    <!-- end Product new-->

    <!-- san pham khuyeens mai -->
    @include('frontend.indexpage.product_sale')
    <!-- end sản phẩm khuyến mại-->
    <!-- san pham noi bat -->
    @include('frontend.indexpage.product_sell')
@endsection