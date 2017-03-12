<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    protected $fillable = ['from', 'to', 'percent', 'description'];
}
