@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Report</div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12 margin-tb" style="padding-bottom: 10px">
                        <div class="pull-left">
                            <h3 style="color:red">Report product selled on <?php echo $_POST['txtYear']?></h3>
                        </div>
                        <div class="pull-right">

                        </div>

                    </div>
                    <!--Tao thong bao-->
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Categories</th>
                            <th>Quantity</th>
                            <th>Month</th>
                            <th>Year</th>
                        </tr>

                        @foreach($reportdates as $key => $reportdate)

                            <tr>
                                <td>{{$key +1}}</td>
                                <td>{{$reportdate->name}}</td>
                                <td></td>
                                <td>{{$reportdate->quantity_sell}}</td>
                                <td><?php echo $_POST['txtMonth'] ?></td>
                                <td><?php echo $_POST['txtYear'] ?></td>
                            </tr>
                        @endforeach


                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection



























