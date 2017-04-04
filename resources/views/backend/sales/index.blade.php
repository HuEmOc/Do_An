@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Sale</div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12 margin-tb" style="padding-bottom: 10px">
                        <div class="pull-left">

                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" style="margin-top: 20px;" href="{{route('sale.create')}}">Create
                                new item</a>
                        </div>

                    </div>
                    <!--Tao thong bao-->
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Percent</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>

                        @foreach($sales as $key => $sale)
                            <tr>
                                <td>{{$sale->id}}</td>
                                <td>{{$sale->from}}</td>
                                <td>{{$sale->to}}</td>
                                <td>{{$sale->percent}}%</td>
                                <td>{{$sale->description}}</td>
                                <td style="width: 20%">
                                    <a class="btn btn-info" href="{{route('sale.show',['id'=>$sale->id])}}">Show</a>
                                    <a class="btn btn-primary"
                                       href="{{route('sale.edit',['id'=>$sale->id])}}">Edit
                                    </a>
                                    <form method="post" style="display: inline-block"
                                          action="{{route('sale.destroy',['id'=>$sale->id])}}">
                                        {!! csrf_field() !!}
                                        <input name="_method" value="delete" hidden>
                                        <button class="btn btn-danger" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    {!! $sales->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection