<?php

namespace App\Http\Controllers\frontend;

use App\Category;
use App\detailOrder;
use App\Product;
use App\product_image;
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

//giỏ hàng
    public function cart()
    {
        $rows = Cart::content();
   // dd($rows);
        return view('frontend.subpage.cart')->with(['rows'=>$rows]);
    }

//chi tiết sản phẩm
    public function detail($alias)
    {
        $item_products = Product::where('alias',$alias)->firstorFail();
        $categories_products = Category::where('id',$item_products->cate_id)->firstorFail();
       // dd($item_products);
        return view('frontend.subpage.detail')->with(['item_products'=>$item_products,'categories_products'=>$categories_products]);
    }




    public function test($id = null){
        if(is_null($id)){
            return  Cart::count();
        }
        $cart = Product::find($id);
        Cart::add($cart->id, $cart->name, 1, $cart->price);
        return  Cart::count();
    }


//thanh toán
    public function pay(){
        $pays = Cart::content();
        //dd($pays);
        return view('frontend.subpage.pay')->with(['$pays'=>$pays]);
    }
//danh mục sản phẩm
    public function categories(){
        $categories = Category::where('parent_id',0)->get();
        $products = Product::orderBy('id', 'DESC')->paginate(2);
        $product_sells = detailOrder::with('order')->whereHas('order', function ($detail) {
            $detail->where('status', 1);
        })->get();
        return view('frontend.subpage.category',compact('categories','products','product_sells'));
    }

    public function cateparent($alias){
        $categories = Category::where('parent_id',0)->orderBy('id','DESC')->get();
        $products = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.cate_id')
            ->select('categories.alias','products.*')->where('categories.alias',$alias)->groupBy('categories.alias','products.alias')
            ->paginate(2);
        $product_sells = detailOrder::with('order')->whereHas('order', function ($detail) {
            $detail->where('status', 1);
        })->get();
       // dd($products);


      //  $cate_products = Product::with('relation_categories')->whereHas('relation_categories', function ($cate) {
       //     $cate->groupBy('categories.alias','products.alias');
       // })->get();



        $namecate = Category::where('alias',$alias)->first();
       // dd($namecate);
        return view('frontend.subpage.cateparent',compact('products','categories','namecate','product_sells'));
    }

    public function demo1(){
        return view('frontend.subpage.demo');
    }

    //contact
    public function contact(){
        return view('frontend.subpage.contact');
    }


    public function rate($id){
        $rate = rate::find($id);
        $productofRate = $rate ->product;
    }


    public function sale(){
        $product = Product::where('sale_id','2')->first();
        $saleOfProduct = $product ->relation_sale;
        dd($saleOfProduct);
    }
}
