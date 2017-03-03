@extends('backend.default')
@section('content')
    <div class="panel panel-danger" style="margin-top: 5px">
        <div class="panel-heading">Items CRUD</div>
        <div class="panel-body">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-lg-12 margin-tb" style="padding-bottom: 10px">
                        <div class="pull-left">

                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" style="margin-top: 20px;" href="{{route('admin.create')}}">Create
                                new product</a>
                        </div>

                    </div>
                    <!--Tao thong bao-->
                    <table class="table table-bordered">
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Address</td>
                            <td>Avatar</td>
                            <td>Action</td>
                        </tr>

                        @foreach($item as $key => $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->address}}</td>
                                <td><img src="{{ asset('photo/'. $item->avatar) }}"
                                         style=" width: 150px ; text-align: center"></td>


                                <td style="width: 30%">
                                    <a class="btn btn-info" href="{{route('admin.show',['id'=>$item->id])}}">Show</a>
                                    <a class="btn btn-primary" href="{{route('admin.edit',['id'=>$item->id])}}">Edit</a>
                                    <form method="post" style="display: inline-block"
                                          action="{{route('admin.destroy',['id'=>$item->id])}}">
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


                </div>
            </div>
        </div>
    </div>
@endsection