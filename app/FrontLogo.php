<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontLogo extends Model
{
    public static function frontlogo(){
        $getlogo= FrontLogo::where('status','active')->get();
        // $getlogo = json_decode(json_encode($getlogo),true);
        return $getlogo;
      }
}
