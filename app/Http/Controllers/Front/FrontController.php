<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;
use App\MiddleBanner;
use App\Category;
use App\Brand;
use App\Product;

class FrontController extends Controller
{
    public function index()
    {

  $banners = Banner::where('status','active')->orderBy('id','desc')->get();
  $middlebanners = MiddleBanner::where('status','active')->orderBy('id','desc')->get();
  $mainCategories = Category::where('status','active')->orderBy('id','desc')->get();
  $brands = Brand::where('status','active')->orderBy('id','desc')->get();
  $products = Product::where('status','active')->orderBy('id','desc')->get();
  $fetured_products = Product::where(['status'=>['active'],'is_fetured'=>['Yes']])->orderBy('id','desc')->get();
  // $products = json_decode(json_encode($products),true);
  //   echo"<pre>";
  //   print_r($brands);die();
        return view('front.index',compact('banners','middlebanners','mainCategories','brands','products','fetured_products'));
    }
}
