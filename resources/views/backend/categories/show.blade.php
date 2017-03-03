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
    <table class="table">
        <tr class="success">
            <td>Name</td>
            <td>{{$categories->name }}</td>
        </tr>
        <tr class="danger">
            <td>Alias</td>
            <td>{{$categories->alias }}</td>
        </tr>

        <tr class="success">
            <td>Key Word</td>
            <td>{{ $categories->keywords }}</td>
        </tr>

        <tr class="danger">
            <td>Description</td>
            <td> {{$categories->description }}</td>
        </tr>

    </table>
    </div>
</div>

@endsection