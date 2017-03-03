@extends('backend.default')
@section('content')

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
    <table class="table">
        <tr class="success">
            <td>Name</td>
            <td>{{ $item->name }}</td>
        </tr>
        <tr class="danger">
            <td>Email</td>
            <td>{{$item->email }}</td>
        </tr>
        <tr class="success">
            <td>Address</td>
            <td> {{$item->address }}</td>
        </tr>


        <tr class="danger">
            <td>Birthday</td>
            <td>{{ $item->birthday }}</td>
        </tr>
        <tr class="">
            <td>Avatar</td>
            <td><img src="{{ asset('photo/'. $item->avatar) }}"
                     style="width: 150px ; text-align: center"></td>
        </tr>
    </table>

@endsection