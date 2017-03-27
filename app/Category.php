<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name', 'alias', 'order','parent_id','keywords','description',
    ];
    public function cate_relation_product(){
       return $this->hasMany('App\Product','cate_id','id');
    }

    public function child(){
        return $this->hasMany('App\Category','parent_id', 'id');
    }
}
