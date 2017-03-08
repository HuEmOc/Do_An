@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">User</div>
        <div class="panel-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show User </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" style="margin-top: 15px;"  href="{{route('admin.index')}}">Back</a>
            </div>
        </div>

    </div>
    <table class="table table-bordered table-hover">
        <tr>
            <th>Name</th>
            <td>{{ $item->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$item->email }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td> {{$item->address }}</td>
        </tr>


        <tr>
            <th>Birthday</th>
            <td>{{ $item->birthday }}</td>
        </tr>
        <tr class="">
            <th>Avatar</th>
            <td>
                <img src="{!! asset('/Image_backend/users/'.$item->avatar) !!}"
                     style="width: 150px ; text-align: center">
            </td>

        </tr>
    </table>
</div>
    </div>
@endsection