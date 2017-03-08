@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Product</div>
        <div class="panel-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" style="margin-top: 15px;"  href="{{route('product.index')}}">Back</a>
            </div>
        </div>

    </div>
    <table class="table table-bordered table-hover">
        <tr>
            <th>Name</th>
            <td>{{ $items->name }}</td>
        </tr>
        <tr>
            <th>Alias</th>
            <td>{{$items->alias }}</td>
        </tr>
        <tr>
            <th>Screen</th>
            <td> {{$items->screen }}</td>
        </tr>
        <tr>
            <th>Operation System</th>
            <td>{{ $items->operationSystem }}</td>
        </tr>
        <tr>
            <th>Cpu</th>
            <td> {{$items->cpu }}</td>
        </tr>
        <tr>
            <th>Ram</th>
            <td>{{ $items->ram }}</td>
        </tr>
        <tr>
            <th>Camera</th>
            <td> {{$items->camera }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ $items->price }}</td>
        </tr>
        <tr>
            <th>Keywords</th>
            <td> {{$items->keyword }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $items->description }}</td>
        </tr>
        <tr>
            <th>Categories_id</th>
            <td> {{$items->cate_id }}</td>
        </tr>
        <tr>
            <th>Sale_id</th>
            <td>{{ $items->sale_id }}</td>
        </tr>

        <tr class="">
            <th>Image</th>
            <td>
                <img src="{!! asset('/Image_frontend/phone/'.$items->image) !!}"
                     style="width: 150px ; text-align: center">
            </td>

        </tr>
    </table>
</div>
    </div>
@endsection