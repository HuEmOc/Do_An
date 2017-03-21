<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\detailOrder;
use App\Category;
use App\product_image;
use App\rate;
use App\User;
use Response;
use Cart;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        //get all the information in the product
        $product_news = Product::orderBy('id', 'DESC')->get();
        $product_sales = Product::leftJoin('sales','sales.id','=','products.sale_id')->select('products.*', 'sales.percent','sales.from','sales.to')->get();
        $product_sells = detailOrder::with('order')->whereHas('order', function ($detail) {
            $detail->where('status', 1);
        })->get();
        return view('frontend.index', compact('product_news', 'product_sales', 'product_sells'));
    }
}
