<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
 public static function sections(){
   $getSection= ChildCategory::with('categories')->where('status','active')->get();
   $getSection = json_decode(json_encode($getSection),true);
   return $getSection;
 }

  public function categories()
{
return $this->hasMany('App\Category','section_id')->where(['parent_id'=>0])->with('subcategories');
}
}
