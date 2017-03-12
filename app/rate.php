<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rate extends Model
{

    protected $table ='rates';
    public function product(){
        return $this->hasOne('App\Product','id','product_id');
        //foreignkey : lket vs bang nao
        //local key : key ơ bảng hiện tại
    }

}
