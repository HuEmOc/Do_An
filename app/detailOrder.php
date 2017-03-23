<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailOrder extends Model
{
    protected $table ='detail_orders';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price', 'total_price', 'status'];

    public function product(){
        return $this ->hasOne('App\Product','id','product_id');
    }

    public function order(){
        return $this ->hasOne('App\Order','id','order_id');
    }
}