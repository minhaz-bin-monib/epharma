<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
    return $this->belongsTo('App\Category','category_id');
    }
  
    public function section()
    {
    return $this->belongsTo('App\ChildCategory','section_id');
    }

    public function images()
    {
    return $this->hasMany('App\ProductGallery','product_id');
    }

    public function attributes()
    {
    return $this->hasMany('App\Attribute','product_id');
    }
    public function brand()
    {
    return $this->belongsTo('App\Brand','brand_id');
    }
    public function users()
    {
    return $this->belongsTo('App\Product','user_id');
    }
}
