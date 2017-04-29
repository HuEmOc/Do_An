<?php

namespace App\Http\Controllers\Backend;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_orders = Order::paginate(5);
        return view('backend.orders.index', compact('list_orders'));
    }

    public function create()
    {
        return view('backend.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only([
            'name', 'alias', 'screen','operationSystem','cpu','ram','camera','price','keyword','description','cate_id','sale_id'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Order::find($id);
        $detail_informations = DB::table('detail_orders')
            ->join('orders','orders.id', '=', 'detail_orders.order_id')
            ->join('products','detail_orders.product_id','=','products.id')
            ->select('detail_orders.*', 'products.name')
            ->where('orders.id',$id)
            ->get();
       // dd($detail_informations);
        return view('backend.orders.show')->with(['items'=>$items,'detail_informations'=>$detail_informations]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Order::find($id);
        return view('backend.orders.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Order::find($id);
        $item->update($request->all());
        foreach ($item->detail_order as $order_detail) {
            $order_detail->update([
                'status' => $request->status
            ]);
        }
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item= Order::find($id);
        if($item->status == 3){
            $item->delete();
        }
        else
             return redirect()->route('order.index')
            ->with('success','order deleted');
    }
}
