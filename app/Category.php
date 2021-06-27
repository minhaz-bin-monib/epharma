<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function subcategories()
{
    return $this->hasMany('App\Category','parent_id');
}
public function section()
{
    return $this->belongsTo('App\ChildCategory','section_id')->select('id','name');
}

public function parentCategory()
{
    return $this->belongsTo('App\Category','parent_id')->select('id','category_name');
}
}
