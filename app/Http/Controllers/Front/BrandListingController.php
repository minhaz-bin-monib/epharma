<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Product;

class BrandListingController extends Controller
{
   public function brand($slug)
   {
      $brands = Brand::where(['slug'=>$slug])->count();
      if($brands >0){
        $brand_products = Product::where(['brand_id'=>$brands['id']])->get();
        //  echo"<pre>";print_r($brand_products);die();
    
        return view('front.products.brand_listing',compact('brand_products'));

      }else{
         echo"not found";
      }
   
   }
}
