@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Product</div>
        <div class="panel-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Sale</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" style="margin-top: 15px;" href="{{route('sale.index')}}"> Back</a>
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
        <form method="post" enctype="multipart/form-data" action="{{route('sale.update',['id'=>$item->id])}}">
            <input name="_method" value="put" type="hidden">
            {!! csrf_field() !!}

            <div class="form-group">
                <strong>From:</strong>
                <input placeholder="from" class="form-control" name="from" type="date" value="{{ \Carbon\Carbon::parse($item->from)->format('Y-m-d')}}">
            </div>

            <div class="form-group">
                <strong>To:</strong>
                <input placeholder="to" class="form-control" name="to" type="date" value="{{ \Carbon\Carbon::parse($item->to)->format('Y-m-d')}}">
            </div>

            <div class="form-group">
                <strong>Percent:</strong>
                <input placeholder="percent" class="form-control" name="percent" type="text" value="{{$item->percent}}">
            </div>

            <div class="form-group">
                <strong>Description:</strong>
                <input placeholder="description" class="form-control" name="description" type="text" value="{{$item->description}}">
            </div>


            <button type="submit" class="btn btn-primary" style="margin-left: 15px;margin-top: 10px">Submit</button>
        </form>

    </div>

    </div>
            </div>
</div>
@endsection