<?php

namespace App\Http\Controllers\backend;

use App\Product;
use App\sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\Order;

class adminController extends Controller
{
    public function Dashboard () {
        $users = User::limit(6)->get();
        $list_orders = Order::paginate(5);
        $order_waiting = Order::where('status', 0)->count();
        $order_sucess = Order::where('status', 1)->count();
        $count = array(
            'user'          => User::count(),
            'categories'    => Category::count(),
            'products'      => Product::count(),
            'sales'         => sale::count()
        );
        return view('backend.dashboard',compact('users','order_waiting','order_sucess','count','list_orders'));
    }

}
