<?php

namespace App\Http\Controllers\backend;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::paginate(4);
        return view('backend.products.index')->with(['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create');

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
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            //getting timestamp
            $timestamp = time();
            $name = $timestamp . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/Image_frontend/phone/', $name);
            $input['image'] = $name;
        }

        Product::create($input);

        return redirect()->route('product.index')
            ->with('success', 'Product create successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Product::find($id);
        //dd($item);
        return view('backend.products.show')->with(['items'=>$items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item= Product::find($id);
        return view('backend.products.edit')->with(['item'=>$item]);
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
        $item = Product::find($id);
        $item->name = $request->name;
        $item->alias = $request->alias;
        $item->screen = $request->screen;
        $item->operationSystem = $request->operationSystem;
        $item->cpu = $request->cpu;
        $item->ram = $request->ram;
        $item->camera = $request->camera;
        $item->price = $request->price;
        $item->keyword = $request->keyword;
        $item->description = $request->description;
        $item->cate_id = $request->cate_id;
        $item->sale_id = $request->sale_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            //getting timestamp
            $timestamp = time();
            $name = $timestamp . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/Image_frontend/phone/', $name);
            $item->image = $name;
        }
        $item->save();
        return redirect()->route('product.index')
            ->with('success', 'Product update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
