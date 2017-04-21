@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Sale</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Create Sale</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" style="margin-top: 15px;" href="{{route('sale.index')}}">
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

                <form method="post" enctype="multipart/form-data" action="{{route('sale.index')}}">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>From:</strong>
                                <input placeholder="From" class="form-control" name="from" type="date"
                                       value="{{old('from')}}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>To:</strong>
                                <input placeholder="To" class="form-control" name="to" type="date"
                                       value="{{old('to')}}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Percent:</strong>
                                <input placeholder="Percent" class="form-control" name="percent" type="text"
                                       value="{{old('percent')}}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                <input placeholder="Description" class="form-control" name="description" type="text"
                                       value="{{old('description')}}">
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