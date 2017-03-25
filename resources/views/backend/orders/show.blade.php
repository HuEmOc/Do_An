@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Order</div>
        <div class="panel-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Order </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" style="margin-top: 15px;"  href="{{route('order.index')}}">Back</a>
            </div>
        </div>

    </div>
    <table class="table table-bordered table-hover">
        <tr>
            <th>Name</th>
            <td>{{ $items->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$items->email }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td> {{$items->phone }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $items->address }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                @if($items->status === 0)
                        {!! 'Pending' !!}
                    @elseif($items->status ===1)
                        {!! 'Waiting' !!}
                    @elseif($items->status ===2)
                        {!! 'Success' !!}
                   @elseif($items->status ===3)
                        {!! 'Fail' !!}
                @endif
            </td>
        </tr>
        <tr>
            <th>Total Quantity</th>
            <td>{{ $items->total_qty }}</td>
        </tr>
        <tr>
            <th>Total Price</th>
            <td> {{$items->total_price }}</td>
        </tr>
        <tr class="">
            <th>Image</th>
            <td>
                @foreach($items->detail_order as $detail_order)
                    <div class="col-md-3">
                        <p><img style="width:150px" class="thumbnail" src="http://huemoc.dev/Image_frontend/phone/{{ $detail_order->product->image }}" ></p>
                        <p>
                            <span style="display: block">Name: {{$detail_order->product->name}}</span>
                            <span style="display: block">Price: {{number_format($detail_order->product->price) }}</span>
                        </p>
                    </div>
                @endforeach
            </td>

        </tr>
    </table>
</div>
    </div>
@endsection