<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'alias', 'screen', 'operationSystem','cpu', 'ram', 'camera', 'price','image', 'keyword', 'description', 'cate_id','sale_id'];
}
