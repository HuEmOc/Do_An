<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rate extends Model
{

    protected $table ='rates';
    public function phone(){
        return $this->hasOne('App\Product');
    }

}
