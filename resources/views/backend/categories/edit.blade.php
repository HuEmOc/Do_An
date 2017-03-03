@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Category</div>
        <div class="panel-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" style="margin-top: 15px;" href="{{route('categories.index')}}"> Back</a>
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
        <form method="post" enctype="multipart/form-data" action="{{route('categories.update',['id'=>$item->id])}}">
            <input name="_method" value="put" type="hidden">
            {!! csrf_field() !!}

            <div class="form-group">
                <strong>Name:</strong>
                <input placeholder="Name" class="form-control" name="name" type="text"
                       value="{{$item->name}}">
            </div>

            <div class="form-group">
                <strong>Alias:</strong>
                <input placeholder="Email" class="form-control" name="email" type="text"
                       value="{{$item->alias}}">
            </div>

            <div class="form-group">
                <strong>Order:</strong>
                <textarea placeholder="Address" class="form-control" name="address"
                          value="{{$item->order}}"></textarea>
            </div>
            <div class="form-group">
                <strong>Parent_id:</strong>
                <textarea placeholder="Address" class="form-control" name="address"
                          value="{{$item->parent_id}}"></textarea>
            </div>
            <div class="form-group">
                <strong>Key words:</strong>
                <textarea placeholder="Address" class="form-control" name="address"
                          value="{{$item->keywords}}"></textarea>
            </div>
            <div class="form-group">
                <strong>Description:</strong>
                <textarea placeholder="Address" class="form-control" name="address"
                          value="{{$item->description}}"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="margin-left: 15px;margin-top: 10px">Submit</button>
        </form>

    </div>
</div>
    </div>
</div>
@endsection