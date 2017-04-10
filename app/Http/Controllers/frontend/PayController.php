<?php

namespace App\Http\Controllers\frontend;
use App\Category;
use App\detailOrder;
use App\Http\Requests\CartRequest;
use App\Order;
use App\Product;
use App\product_image;
use App\rate;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use Cart;
use DB;
class PayController extends Controller
{
    public function pay(){
        $pays = Cart::content();
        return view('frontend.subpage.pay',compact('pays'));
    }
    public function postPay( CartRequest $request){
        $pays = Cart::content();
        $data['name'] = $request->txtName;
        $data['email'] = $request->txtEmail;
        $data['phone'] = $request->txtPhone;
        $data['address'] = $request->txtAddress;
        $data['status'] = 0;
        $data['total_qty'] = Cart::content()->count();
        $data['total_price'] = $request->total_price;
        $order_result = Order::create($data);
        foreach ($pays as $item) {
            $dataItem = [];
            $dataItem['order_id'] = $order_result->id;
            $dataItem['product_id'] = $item->options->cart->id;
            $dataItem['quantity'] = $item->qty;
            $dataItem['price'] = $item->total / $item->qty;
            $dataItem['total_price'] = $item->total;
            detailOrder::create($dataItem);
        }
        Cart::destroy();
        return redirect()->route('notification');

    }
    public function notification(){
        $thanks = Cart::content();
        //dd($thanks);
        return view('frontend.subpage.notification',compact('thanks'));
    }
}
