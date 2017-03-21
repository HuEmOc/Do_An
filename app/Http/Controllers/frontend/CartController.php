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
class CartController extends Controller
{
    public function cart()
    {
        $rows = Cart::content();
        return view('frontend.subpage.cart')->with(['rows'=>$rows]);
    }

    //thêm vào giỏ hàng
    public function addtocart($id = null){
        if (is_null($id)) {
            return (Cart::count()) ;
        }
        $add_cart = Product::findOrFail($id);
        if (is_null($add_cart->relation_sale)) {
            $price = $add_cart->price;
        }else{
            $price = $add_cart->price * (100 - $add_cart->relation_sale->percent) / 100;
        }
        Cart::add($add_cart->id, $add_cart->name, 1,$price, array('cart' => $add_cart));
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

}
