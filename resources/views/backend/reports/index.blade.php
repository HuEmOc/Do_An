@extends('backend.default')
@section('content')
    <div class="panel panel-primary" style="margin-top: 5px">
        <div class="panel-heading">Report</div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12 margin-tb" style="padding-bottom: 10px">
                        <div class="pull-left">
                            <form method="POST" action="/demo">
                                {{ csrf_field() }}
                                   Month:  <input type="text" name="txtMonth" value="">
                                   Year :  <input type="text" name="txtYear" value="">
                                   <input type="submit" name="form_click" value="Report">


                            </form>
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

                        @foreach($reports as $key => $report)
                           <tr>
                               <td>{{$key +1}}</td>
                               <td>{{$report->name}}</td>
                               <td></td>
                               <td>{{$report->quantity_sell}}</td>
                               <td>{{date('m',strtotime($report->created_at))}}</td>
                               <td>{{date('Y',strtotime($report->created_at))}}</td>
                           </tr>
                        @endforeach


                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection