@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Order Item</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Order</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" style="margin-top: 15px;" href="{{route('order.index')}}"> Back</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 margin-tb">
                    <div style="color: red">
                        @if ( $errors->any() )
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <form method="post" enctype="multipart/form-data" action="{{route('order.update',['id'=>$item->id])}}">
                        <input name="_method" value="put" type="hidden">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <strong>Name:</strong>
                            <input placeholder="Name" class="form-control" name="name" type="text" value="{{$item->name}}">
                        </div>

                        <div class="form-group">
                            <strong>Phone:</strong>
                            <input placeholder="alias" class="form-control" name="phone" type="text" value="{{$item->phone}}">
                        </div>

                        <div class="form-group">
                            <strong>Email:</strong>
                            <input placeholder="screen" class="form-control" name="email" type="text" value="{{$item->email}}">
                        </div>

                        <div class="form-group">
                            <strong>Address:</strong>
                            <input placeholder="operationSystem" class="form-control" name="address" type="text" value="{{$item->address}}">
                        </div>

                        <div class="form-group">
                            <strong>Status :</strong>
                            <select class="form-control" name="status">
                                <option value="0" @if($item->status === 0) selected @endif>Pending</option>
                                <option value="1" @if($item->status === 1) selected @endif>Waiting</option>
                                <option value="2" @if($item->status === 2) selected @endif>Success</option>
                                <option value="3" @if($item->status === 3) selected @endif>Fail</option>
                            </select>
                        </div>

                        <div class="row">
                            @foreach($item->detail_order as $detail_order)
                                <div class="col-md-3">
                                    <p><img style="width:150px; height: 170px" class="thumbnail" src="http://huemoc.dev/Image_frontend/phone/{{ $detail_order->product->image }}" ></p>
                                    <p>
                                        <span style="display: block">Name: {{$detail_order->product->name}}</span>
                                        <span style="display: block">Price: {{number_format($detail_order->product->price) }}</span>
                                    </p>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary" style="margin-left: 15px;margin-top: 10px">Submit</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection