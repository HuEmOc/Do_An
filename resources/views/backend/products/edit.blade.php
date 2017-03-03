@extends('backend.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" style="margin-top: 15px;" href="{{route('admin.index')}}"> Back</a>
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
        <form method="post" enctype="multipart/form-data" action="{{route('admin.update',['id'=>$item->id])}}">
            <input name="_method" value="put" type="hidden">
            {!! csrf_field() !!}

            <div class="form-group">
                <strong>Name:</strong>
                <input placeholder="Name" class="form-control" name="name" type="text" value="{{$item->name}}">
            </div>

            <div class="form-group">
                <strong>Email:</strong>
                <input placeholder="Email" class="form-control" name="email" type="text" value="{{$item->email}}">
            </div>

            <div class="form-group">
                <strong>Address:</strong>
                <textarea placeholder="Address" class="form-control" name="address"
                          value="{{$item->address}}"></textarea>
            </div>

            <div class="form-group">
                <strong>Gender:</strong>
                <input id="gender" type="radio"  name="gender" value="1" required autofocus> Girl

                <input id="gender" type="radio"  name="gender" value="2" required autofocus> Boy

                <input id="gender" type="radio"  name="gender" value="0" required autofocus> Undefine
            </div>

            <div class="form-group">
                <strong>Avatar:</strong>
                <input placeholder="Avatar" class="form-control" name="avatar" type="file" value="{{$item->avatar}}">
            </div>

            <img style="height: 150px;" src="{{ asset('/photo/'. $item->avatar) }}">

            <div class="form-group">
                <strong>Birthday:</strong>
                <input id="birthday" type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" required autofocus
            </div>
            <button type="submit" class="btn btn-primary" style="margin-left: 15px;margin-top: 10px">Submit</button>
        </form>

    </div>

    </div>

@endsection