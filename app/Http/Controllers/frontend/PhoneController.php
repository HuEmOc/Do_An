<?php

namespace App\Http\Controllers\frontend;

use App\Category;
use App\Product;
use App\rate;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use Cart;
use DB;
//use Gloudemans\Shoppingcart\Facades\Cart;


class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the information in the product
        $product_news = Product::orderBy('id', 'DESC')->get();
        $product_sales = Product::orderBy('id', 'DESC')->get();
        // dd($product_sales);
        $product_sells = Product::all();
        return view('frontend.index', compact('product_news', 'product_sales', 'product_sells'));
        // return view('frontend.index')->with(['product_news'=>$product_news,'product_sales'=>$product_sales]);
        //$product_list = Product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function demo()
    {
        $product_news = Product::all();
        dd($product_news);
    }
//giỏ hàng
    public function cart()
    {
        $rows = Cart::content();
        return view('frontend.subpage.cart')->with(['rows'=>$rows]);
    }

//chi tiết sản phẩm
    public function detail()
    {
        $products = Product::orderBy('id','desc')->get();
        //dd($products);
        return view('frontend.subpage.detail')->with(['products'=>$products]);
    }


//search
    public function search(){
        $products = Product::all();
        return Response::json(['records' => $products]);
        //return view('frontend.subpage.search');
    }

    public function theme(){
        return view('frontend.subpage.search');
    }



    public function test($id = null){
        if(is_null($id)){
            return  Cart::count();
        }
        $cart = Product::find($id);
        Cart::add($cart->id, $cart->name, 1, $cart->price);
        return  Cart::count();
    }



//thêm vào giỏ hàng
    public function addtocart($id = null){
        if (is_null($id)) {
            return (Cart::count()) ;
        }
        $add_cart = Product::findOrFail($id);
        Cart::add($add_cart->id, $add_cart->name, 1, $add_cart->price);
        return (Cart::count()) ;
        //return redirect()->route('giohang');
    }
//hủy giỏ hàng
    public function delete_cart(){
        Cart::destroy();
        return redirect()->route('cart');
    }
//xóa giỏ hàng
    public function remove_cart($id){
        Cart::remove($id);
        return redirect()->route('cart');
    }
//thanh toán
    public function pay(){
        $pays = Cart::content();
        //dd($pays);
        return view('frontend.subpage.pay')->with(['$pays'=>$pays]);
    }
//danh mục sản phẩm
    public function categories(){
        //$categories = Category::all();
        $categories = DB::table('categories')->select('id','name','alias','parent_id')->where('parent_id',0)->orderBy('id','DESC')->get();
        $products = Product::paginate(3);
        //dd($categories);
        return view('frontend.subpage.category')->with(['categories'=>$categories,'products'=>$products]);
    }

    public function cateparent($alias){
        $categorys = DB::table('categories')->select('id','name','alias','parent_id')->where('parent_id',0)->orderBy('id','DESC')->get();
        $products = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.cate_id')
            ->select('categories.alias','products.*')->where('categories.alias',$alias)->groupBy('categories.alias','products.alias')
            ->paginate(9);
        $namecate = DB::table('categories')->select('id','name','alias','prarent_id')->where('alias',$alias)->first();
        return view('frontend.pages.cateparent',compact('products','categorys','namecate'));
    }

    public function demo1(){
        return view('frontend.subpage.demo');
    }

    //contact
    public function contact(){
        return view('frontend.subpage.contact');
    }



    public function abc($id){
        $product = rate::find($id)->name;
        dd($product);
    }

}
