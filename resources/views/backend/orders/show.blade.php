@extends('backend.default')
@section('content')
    <div style="background-color: #5cacfd; color: white;">
    <div id="printable" style="text-align: center; color: red" >Chi tiết đơn hàng của <?php echo $items->name  ?></div>
    <div style="text-align: center">Thông tin khách hàng</div><br>

    <div style="border: 1px solid grey ; width: 400px;  margin: 0 auto; text-align: left; padding: 10px 0px 10px 80px;">

        Tên người mua hàng :  {{$items->name }}<br>
        Số điện thoại       :  {{$items->email}} <br>
        Địa chỉ            :  {{$items->address}} <br>
    </div>

    <div>
        <div style="text-align: center; margin-top: 20px; margin-bottom: 10px;">Đơn hàng bao gồm :</div>
        <table class="table " style="margin-left: 10px; margin-right: 10px">
                <th>STT</th>
                <th>Phone Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
            </tr>

            @foreach($detail_informations as $key => $detail_information)

            <tr>
                <td>{{$key +1}}</td>
                <td>{{$detail_information->name}}</td>
                <td>{{$detail_information->quantity}}</td>
                <td>{{$detail_information->price}}</td>
                <td>{{$detail_information->total_price}}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <div style="text-align: center">Tổng giá trị giỏ hàng là :{{$items->total_price }} </div>
    <div style="text-align: center">
        Status :
        @if($items->status === 0)
            {!! 'Pending' !!}
        @elseif($items->status ===1)
            {!! 'Waiting' !!}
        @elseif($items->status ===2)
            {!! 'Success' !!}
        @elseif($items->status ===3)
            {!! 'Fail' !!}
        @endif
    </div>
    </div>

    <button class="print-link" onclick="jQuery.print()"> Print this </button>





@endsection