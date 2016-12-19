<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'user_id', 'name','description','price','stock',
      ];
      /**
       * The attributes that should be hidden for arrays.
       *
       * @var array
       */
      protected $hidden = [
          'user_id',
      ];
      public function user()
      {
        return $this->belongsTo('App\User');
      }
}
