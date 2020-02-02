<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    
    public function area(){
      return $this->belongsTo(Area::class);   
    }


    public function pizza(){
      return $this->belongsTo(Pizza::class);   
    }


}
