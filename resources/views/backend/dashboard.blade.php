@extends('backend.default')
@section('content')
<!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$count['products']}}</h3>
                    <p>Products</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->



        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$count['users']}}</h3>
                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>

                <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner" style="text-align: center">
                    <h3>{{$count['orders']}}</h3>
                    <p>Orders</p>
                </div>
                <a href="{{route('order.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$count['sales']}}</h3>
                    <p>Sales</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('sale.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>


    </div>

<div style="text-align: center; font-weight: bold;font-size: 20px;margin-top: 20px; color: orangered">
    <h1>Website bán điện thoại di động trực tuyến</h1>
    <div>Sinh viên : VÕ THỊ HUỆ</div>
    <div>Lớp : CNTT3 _ K54</div>
    <div>Email : vothihue2807@gmail.com</div>

</div>





@endsection
