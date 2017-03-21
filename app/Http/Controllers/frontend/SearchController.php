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

class SearchController extends Controller
{
    //search
    public function search(){
        $products = Product::all();
        return Response::json(['records' => $products]);
    }
    public function theme(){
        return view('frontend.subpage.search');
    }
}
