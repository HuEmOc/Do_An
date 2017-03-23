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

//chi tiết sản phẩm
    public function detail($alias)
    {
        $item_products = Product::where('alias',$alias)->firstorFail();
        $categories_products = Category::where('id',$item_products->cate_id)->firstorFail();
        $quantitySaled = $this->countQuantity($item_products->id);
        if ($item_products->quantity - $quantitySaled > 0) {
            $status = 'Còn Hàng';
        } else {
            $status = 'Hết Hàng';
        }
        return view('frontend.subpage.detail')->with(['item_products'=>$item_products,'categories_products'=>$categories_products, 'status' => $status]);
    }


//danh mục sản phẩm
    public function categories(){
        $categories = Category::where('parent_id',0)->get();
        $products = Product::orderBy('id', 'DESC')->paginate(5);
        $product_sells = detailOrder::with('order')->whereHas('order', function ($detail) {
            $detail->where('status', 1);
        })->get();
        return view('frontend.subpage.category',compact('categories','products','product_sells'));
    }

    public function cateparent($alias){
        $categories = Category::where('parent_id',0)->orderBy('id','DESC')->get();
        $cate_product = Category::where('alias', $alias)->first();
        $products = $cate_product->cate_relation_product;
        $product_sells = detailOrder::with('order')->whereHas('order', function ($detail) {
            $detail->where('status', 1);
        })->get();
        $namecate = Category::where('alias',$alias)->first();
        return view('frontend.subpage.cateparent',compact('products','categories','namecate','product_sells'));
    }

    public function countQuantity ($product_id) {
        $total = detailOrder::where('product_id', $product_id)->where('status', 2)->get();
        $quantity = 0;
        foreach ($total as $item) {
            $quantity += $item->quantity;
        }
        return $quantity;
    }
}
