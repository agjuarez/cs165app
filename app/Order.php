<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function orderdetail()
    {
      return $this->hasMany('App\Orderdetail');
    }
}
