@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Product</div>
        <div class="panel-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" style="margin-top: 15px;" href="{{route('product.index')}}"> Back</a>
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
        <form method="post" enctype="multipart/form-data" action="{{route('product.update',['id'=>$item->id])}}">
            <input name="_method" value="put" type="hidden">
            {!! csrf_field() !!}

            <div class="form-group">
                <strong>Name:</strong>
                <input placeholder="Name" class="form-control" name="name" type="text" value="{{$item->name}}">
            </div>

            <div class="form-group">
                <strong>Alias:</strong>
                <input placeholder="alias" class="form-control" name="alias" type="text" value="{{$item->alias}}">
            </div>

            <div class="form-group">
                <strong>Screen:</strong>
                <input placeholder="screen" class="form-control" name="screen" type="text" value="{{$item->screen}}">
            </div>

            <div class="form-group">
                <strong>Operation System:</strong>
                <input placeholder="operationSystem" class="form-control" name="operationSystem" type="text" value="{{$item->operationSystem}}">
            </div>

            <div class="form-group">
                <strong>Cpu :</strong>
                <input placeholder="cpu" class="form-control" name="cpu" type="text" value="{{$item->cpu}}">
            </div>

            <div class="form-group">
                <strong>Ram :</strong>
                <input placeholder="ram" class="form-control" name="ram" type="text" value="{{$item->ram}}">
            </div>

            <div class="form-group">
                <strong>Camera :</strong>
                <input placeholder="camera" class="form-control" name="camera" type="text" value="{{$item->camera}}">
            </div>


            <div class="form-group">
                <strong>Price :</strong>
                <input placeholder="price" class="form-control" name="price" type="text" value="{{$item->price}}">
            </div>

            <div class="form-group">
                <strong>Key word :</strong>
                <input placeholder="keyword" class="form-control" name="keyword" type="text" value="{{$item->keyword}}">
            </div>

            <div class="form-group">
                <strong>Description:</strong>
                <textarea placeholder="Description" class="form-control" name="description" >{{ old('description', $item->description) }}</textarea>
            </div>

            <div class="form-group">
                <strong>Categories:</strong>
                <select class="form-control" name="cate_id">
                    {!! $list_cat !!}
                </select>
            </div>

            <div class="form-group">
                <strong>Sale_id : </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select class="form-control" name="sale_id">
                    {!! $list_sales !!}
                </select>
            </div>



            <div class="form-group">
                <strong>Image:</strong>
                <input placeholder="Image" class="form-control" name="image" type="file" value="{{$item->image}}">
            </div>

            <img src="{!! asset('/Image_frontend/phone/'.$item->image) !!}"
                 style="width: 150px ; text-align: center">

            <button type="submit" class="btn btn-primary" style="margin-left: 15px;margin-top: 10px">Submit</button>
        </form>

    </div>

    </div>
            </div>
</div>
@endsection