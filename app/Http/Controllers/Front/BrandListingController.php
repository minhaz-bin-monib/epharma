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
      if($brands==0){
       abort(404);
       $breadcrumb = "<a  href='/'>Home</a> > <a href='".$brands->name."'>
       ".$brand_products->product_name."</a>
         > ";
        return view('front.products.brand_listing',compact('brand_products','breadcrumb'));

      }else{
         
        $brands = Brand::where(['slug'=>$slug])->first();
        $brand_products = Product::where(['brand_id'=>$brands['id']])->get();
        $breadcrumb = "<a href='/'>Home</a> > <a href='".$brands->slug."'>
        ".$brands->name."</a>";
        //  echo"<pre>";print_r($brand_products);die();
    
        return view('front.products.brand_listing',compact('brand_products','breadcrumb'));
      }
   
   }
}
