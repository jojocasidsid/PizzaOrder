<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    
    public function topping(){
      return $this->hasMany(Topping::class);  
    }

    public function order(){
      return $this->belongsTo(Order::class);  
    }

}
