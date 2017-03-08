@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Category</div>
        <div class="panel-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show categories </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" style="margin-top: 15px;"  href="{{route('categories.index')}}">Back</a>
            </div>
        </div>

    </div>
    <table class="table  table-bordered  table-hover">
        <tr>
            <th>Name</th>
            <td>{{$categories->name }}</td>
        </tr>
        <tr>
            <th>Alias</th>
            <td>{{$categories->alias }}</td>
        </tr>

        <tr>
            <th>Order</th>
            <td>{{ $categories->order }}</td>
        </tr>

        <tr>
            <th>Parent_id</th>
            <td>{{ $categories->parent_id }}</td>
        </tr>

        <tr>
            <th>Key Word</th>
            <td>{{ $categories->keywords }}</td>
        </tr>


        <tr>
            <th>Description</th>
            <td> {{$categories->description }}</td>
        </tr>

    </table>
    </div>
</div>

@endsection