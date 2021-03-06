@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">User</div>
        <div class="panel-body">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-lg-12 margin-tb" style="padding-bottom: 10px">
                        <div class="pull-left">

                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" style="margin-top: 20px;" href="{{route('user.create')}}">Create
                                new item</a>
                        </div>

                    </div>
                    <!--Tao thong bao-->
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Avatar</th>
                            <th>Action</th>
                        </tr>

                        @foreach($items as $key => $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td style="word-break: break-all;">{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td style="word-break: break-all;">{{$item->address}}</td>
                                <td>
                                    <img src="{!! asset('/Image_backend/users/'.$item->avatar) !!}"
                                         style="width: 150px ; text-align: center">
                                </td>


                                <td style="width: 30%">
                                    <a class="btn btn-info" href="{{route('user.show',['id'=>$item->id])}}">Show</a>
                                    <a class="btn btn-primary" href="{{route('user.edit',['id'=>$item->id])}}">Edit</a>
                                    <form method="post" style="display: inline-block"
                                          action="{{route('user.destroy',['id'=>$item->id])}}">
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