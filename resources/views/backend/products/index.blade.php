@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Product</div>
        <div class="panel-body">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-lg-12 margin-tb" style="padding-bottom: 10px">
                        <div class="pull-left">

                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" style="margin-top: 20px;" href="{{route('product.create')}}">Create
                                new item</a>
                        </div>

                    </div>
                    <!--Tao thong bao-->
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Alias</th>
                            <th>Scree</th>
                            <th>Operation System</th>
                            <th>Cpu</th>
                            <th>Ram</th>
                            <th>Camera</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>

                        @foreach($items as $key => $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item['name']}}</td>
                                <td>{{$item->alias}}</td>
                                <td>{{$item->screen}}</td>
                                <td>{{$item->operationSystem}}</td>
                                <td>{{$item->cpu}}</td>
                                <td>{{$item->ram}}</td>
                                <td>{{$item->camera}}</td>
                                <td>{{$item->price}}</td>
                                <td>
                                    <img src="{!! asset('/Image_frontend/phone/'.$item->image) !!}"
                                         style="width: 150px ; text-align: center">
                                </td>
                                <td style="width: 20%">
                                    <a class="btn btn-info" href="{{route('product.show',['id'=>$item->id])}}">Show</a>
                                    <a class="btn btn-primary"
                                       href="{{route('product.edit',['id'=>$item->id])}}">Edit
                                    </a>
                                    <form method="post" style="display: inline-block"
                                          action="{{route('product.destroy',['id'=>$item->id])}}">
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
                    {!! $items->render() !!}

                </div>
            </div>
        </div>
    </div>
@endsection