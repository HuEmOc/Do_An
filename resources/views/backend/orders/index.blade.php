@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Orders</div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Tong San Pham</th>
                    <th>Tong Gia Don Hang</th>
                    <th>Action</th>
                </tr>

                @foreach($list_orders as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->total_qty}}</td>
                        <td>{{number_format($item->total_price)}}</td>
                        <td style="width: 20%">
                            <a class="btn btn-info" href="{{route('orders.edit',['id'=>$item->id])}}">EDIT</a>
                        </td>
                    </tr>
                @endforeach

            </table>



            {!! $list_orders->render() !!}
        </div>
    </div>
@stop