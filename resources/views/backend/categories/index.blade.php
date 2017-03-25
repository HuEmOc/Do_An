@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Category</div>
        <div class="panel-body">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-lg-12 margin-tb" style="padding-bottom: 10px">
                        <div class="pull-left">

                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" style="margin-top: 20px;" href="{{route('categories.create')}}">Create
                                new item</a>
                        </div>

                    </div>
                    <!--Tao thong bao-->
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Alias</th>
                            <th>Order</th>
                            <th>Parent_id</th>
                            <th>Key Word</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>

                        @foreach($items as $key => $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->alias}}</td>
                                <td>{{$item->order}}</td>
                                <td>{{$item->parent_id}}</td>
                                <td>{{$item->keywords}}</td>
                                <td>{{$item->description}}</td>

                                <td style="width: 30%">
                                    <a class="btn btn-info" href="{{route('categories.show',['id'=>$item->id])}}">Show</a>
                                    <a class="btn btn-primary" href="{{route('categories.edit',['id'=>$item->id])}}">Edit</a>
                                    <form method="post" style="display: inline-block"
                                          action="{{route('categories.destroy',['id'=>$item->id])}}">
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
                    <div style="text-align: center">{!! $items->render() !!}</div>

                </div>
            </div>
        </div>
    </div>
@endsection