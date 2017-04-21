<?php

namespace App\Http\Controllers\backend;

use App\detailOrder;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $reports = DB::table('detail_orders')
            ->join('products', 'detail_orders.product_id', '=', 'products.id')
            ->select('detail_orders.*','products.name','product_id', DB::raw('SUM(detail_orders.quantity) as quantity_sell'))
            ->groupBy('product_id')
            ->get();
        ;
        //$result =  $a ->execute();
        //dd($reports);

        return view('backend.reports.index')->with('reports',$reports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moneyOfMonths = DB::table('orders')
            ->select(DB::raw('SUM(orders.total_price) as total_money'),DB::raw('YEAR(created_at) as year, MONTH(created_at) as month'),'orders.created_at')
            ->groupBy('year','month')
            ->get();
        $moneyOfYears =  DB::table('orders')
            ->select(DB::raw('SUM(orders.total_price) as total_money'),DB::raw('YEAR(created_at) as year'),'orders.created_at')
            ->groupBy('year')
            ->get();
        return view('backend.reports.moneyOfMonth',compact('moneyOfYears','moneyOfMonths'));
    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
    public function demo(){
        if (isset($_POST['form_click'])) {
                $month = $_POST['txtMonth'];
                $year = $_POST['txtYear'];
        }
        $reportdates = DB::table('detail_orders')
             ->join('products', 'detail_orders.product_id', '=', 'products.id')
             ->select('detail_orders.*','products.name','product_id', DB::raw('SUM(detail_orders.quantity) as quantity_sell'))
             ->groupBy('product_id')
             ->whereMonth('detail_orders.created_at',$month)
             ->whereYear('detail_orders.created_at', $year)
             ->get();
       return view('backend.reports.demo')->with('reportdates',$reportdates);
    }

    public function moneyOfMonth(){

        //
    }
}
