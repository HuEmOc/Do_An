@extends('backend.default')
@section('content')
    <div class="col-xs-6">
        <h2 class="sub-header">Month</h2>
        <div class="table-responsive">
            <table class="table table-striped" id="table2excel">
                <thead>
                    <tr class="noExl">
                        <th class="col-md-1">Month</th>
                        <th class="col-md-2">Year</th>
                        <th class="col-md-3">Total_Money</th>
                    </tr>
                    <tr>
                        <th class="col-md-1">Month</th>
                        <th class="col-md-2">Year</th>
                        <th class="col-md-3">Total_Money</th>
                    </tr>
                </thead>

                    @foreach($moneyOfMonths as $moneyOfMonth)
                    <tbody>
                        <tr>
                            <td class="col-md-1">{{date('m',strtotime($moneyOfMonth->created_at))}}</td>
                            <td class="col-md-2">{{date('Y',strtotime($moneyOfMonth->created_at))}}</td>
                            <td class="col-md-3">{{number_format($moneyOfMonth->total_money,0,',','.')}}</td>
                        </tr>
                    </tbody>
                     @endforeach

                <button>Export</button>
            </table>

        </div>

    </div>
    <div class="col-xs-6">
        <h2 class="sub-header">Year</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">Year</th>
                        <th class="col-md-2">Total_Money</th>
                    </tr>
                </thead>
                @foreach($moneyOfYears as $moneyOfYear)
                    <tbody>
                        <tr>
                            <td class="col-md-1">{{date('Y',strtotime($moneyOfYear->created_at))}}</td>
                            <td class="col-md-2">{{number_format($moneyOfYear->total_money,0,',','.')}}</td>
                        </tr>
                    </tbody>
                    @endforeach
            </table>
        </div>
        <div id="push"></div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/src/jquery.table2excel.js"></script>


@endsection