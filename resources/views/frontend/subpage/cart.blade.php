@extends('frontend.master')
@section('title','Giỏ hàng')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" style="margin-top: 20px;">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($rows as $row )

                        <tr>
                            <td><img src="@if (!$row->options->isEmpty()){!! asset('/upload/'.$row->options->image)!!}@endif" width="40"></td>
                            <td><a href=" @if (!$row->options->isEmpty()){!! url('/',[$row->options->alias]) !!}@endif">{!! $row->name !!}</a></td>
                            <td>
                               {{number_format($row->price, '0', ',', '.')}}đ
                            </td>
                            <td>{{$row->qty}}</td>
                            <td>{{$row->total}}</td>
                            <td>
                                <a class="fa fa-trash-o item-remove"  href="{!! url('remove_cart',['id'=>$row->rowId])!!}" ></a>
                            </td>
                        </tr>
                    @endforeach
                            <tr>
                                <td colspan="6">
                                    <div class="pull-left">
                                        <a class="comment-submit" href="{!! url('/phone') !!}" >Tiếp tục mua sắm</a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="comment-submit" href="{!! url('delete_cart') !!}">Hủy giỏ hàng</a>
                                        <a class="comment-submit" href="{!! url('thanh-toan') !!}">Thanh toán</a>
                                    </div>
                                </td>
                            </tr>
                    </tbody>

                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

