@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Product</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Create Product</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" style="margin-top: 15px;" href="{{route('product.index')}}">
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

                <form method="post" enctype="multipart/form-data" action="{{route('product.index')}}">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input placeholder="Name" class="form-control" name="name" type="text"
                                       value="{{old('name')}}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Alias:</strong>
                                <input placeholder="Alias" class="form-control" name="alias" type="text"
                                       value="{{old('alias')}}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Screen:</strong>
                                <input placeholder="Screen" class="form-control" name="screen" type="text"
                                       value="{{old('screen')}}">
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Operation System:</strong>
                                <input placeholder="OperationSystem" class="form-control" name="operationSystem"
                                       type="text" value="{{old('operationSystem')}}">
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Cpu:</strong>
                                <input placeholder="Cpu" class="form-control" name="cpu" type="text"
                                       value="{{old('cpu')}}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Ram:</strong>
                                <input placeholder="Ram" class="form-control" name="ram" type="text"
                                       value="{{old('ram')}}">
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Camera:</strong>
                                <input placeholder="Camera" class="form-control" name="camera" type="text"
                                       value="{{old('camera')}}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Price:</strong>
                                <input placeholder="Price" class="form-control" name="price" type="text"
                                       value="{{old('price')}}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Quantity:</strong>
                                <input placeholder="Quantity" class="form-control" name="quantity" type="text"
                                       value="{{old('quantity')}}">
                            </div>
                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Introduce:</strong>
                                <input placeholder="Introduce" class="form-control" name="Introduce" type="text"
                                       value="{{old('introduce')}}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                <input placeholder="Description" class="form-control" name="description" type="text"
                                       value="{{old('description')}}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Categories:</strong>
                                <select class="form-control" name="cate_id">
                                    {!! $list_cat !!}
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sale_id:</strong>
                                <select class="form-control" name="sale_id">
                                    {!! $list_sales !!}
                                </select>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Image:</strong>
                                <input placeholder="Image" class="form-control" name="image" type="file">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

@endsection