<?php

namespace App\Http\Controllers\backend;

use App\Product;
use App\Category;
use App\sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
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
        $listCategories = $this->categorySelectBox();
        $listSales = $this->saleSelectBox();
        return view('backend.products.create')->with(['list_cat' => $listCategories, 'list_sales' => $listSales]);

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
        //dd($items);
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
        $listCategories = $this->categorySelectBox($item->cate_id);
        $listSales = $this->saleSelectBox($item->sale_id);
        return view('backend.products.edit')->with(['item'=>$item, 'list_cat' => $listCategories, 'list_sales' => $listSales]);
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

    public function categorySelectBox ($id_selected = null) {
        $categories = Category::where('parent_id', 0)->get();
        $categoriesHtml = '';
        foreach ($categories as $category) {
            $selected = ($id_selected === $category->id) ? 'selected' : '';
            $categoriesHtml .= '<option value="'.$category->id.'" '. $selected .'>' . $category->name . '</option>';
            foreach ($category->child as $child) {
                $selected = ($id_selected === $child->id) ? 'selected' : '';
                $categoriesHtml .= '<option value="'.$child->id.'" '. $selected .'>|— ' . $child->name . '</option>';
            }
        }
        return $categoriesHtml;
    }

    public function  saleSelectBox($id_selected = null) {
        $sales = sale::all();
        $salesHtml = '<option value="0">Không có sale cho đơn hàng này</option>';
        foreach ($sales as $sale) {
            $selected = ($id_selected === $sale->id) ? 'selected' : '';
            $salesHtml .= '<option value="'.$sale->id.'" '. $selected .'>' . $sale->description . '</option>';
        }
        return $salesHtml;
    }



    public function destroy($id){
        $item = Product::find($id);
        $item->delete();
        return redirect()->route('product.index')->with('success','Product remove successfully');
    }
}
