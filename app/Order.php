<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='orders';
    protected $fillable = ['name', 'email', 'phone', 'address', 'total_qty', 'status', 'total_price'];


    public function detail_order () {
        return $this->hasMany('App\detailOrder', 'order_id', 'id');
    }
}
