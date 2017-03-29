@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Sale</div>
        <div class="panel-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Sale </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" style="margin-top: 15px;"  href="{{route('sale.index')}}">Back</a>
            </div>
        </div>

    </div>
    <table class="table table-bordered table-hover">
        <tr>
            <th>From</th>
            <td>{{ $items->from }}</td>
        </tr>
        <tr>
            <th>To</th>
            <td>{{$items->to }}</td>
        </tr>
        <tr>
            <th>Percent</th>
            <td> {{$items->percent }}%</td>
        </tr>
        <tr>
            <th>Operation System</th>
            <td>{{ $items->description }}</td>
        </tr>

    </table>
</div>
    </div>
@endsection