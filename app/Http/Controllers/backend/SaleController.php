<?php

namespace App\Http\Controllers\backend;

use App\sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = sale::paginate(4);
        return view('backend.sales.index')->with(['sales'=>$sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
        //dd($request->all());
        $input = $request->only([
            'from', 'to', 'percent','description',
        ]);
        sale::create($input);
        return redirect()->route('sale.index')
            ->with('success', 'Sale create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = sale::find($id);
        return view('backend.sales.show')->with(['items'=>$items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = sale::find($id);
        return view('backend.sales.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaleRequest $request, $id)
    {
        $item = sale::find($id);
        $item->from = $request->from;
        $item->to = $request->to;
        $item->percent = $request->percent;
        $item->description = $request->description;
        $item->save();
        return redirect()->route('sale.index')
            ->with('success', 'Sale update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = sale::find($id);
        $item->delete();
        return redirect()->route('sale.index')->with('success','Sale remove successfully');
    }
}
