<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function topping(){
      return $this->hasMany(Topping::class);  
    }
}
