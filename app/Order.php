<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function pizza(){
      return $this->hasMany(Pizza::class);  
    }
}
