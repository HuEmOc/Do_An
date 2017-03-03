@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Category</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Create category</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" style="margin-top: 15px;" href="{{route('categories.index')}}">
                            Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div style="color: red">
                    @if ( $errors->any() )
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>


                <form method="post" enctype="multipart/form-data" action="{{route('categories.index')}}">
                    {!! csrf_field() !!}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input  class="form-control" name="name" type="text">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Alias:</strong>
                            <input class="form-control" name="alias" type="text">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Order:</strong>
                            <input  class="form-control" name="order" type="number">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Parent_id:</strong>
                            <input  class="form-control" name="parent_id" type="number">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Keywords:</strong>
                            <input  class="form-control" name="keywords" type="text">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea  class="form-control"
                                      name="description">{{old('description')}}</textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

@endsection