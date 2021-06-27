<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Brand;
use App\Product;
use App\Category;
use App\ChildCategory;
use App\ProductGallery;
use App\Attribute;
use App\User;
use Auth;
use Image;

class productController extends Controller
{
    public function index()
    {
      $user_id = Auth::guard('admin')->user()->id;
      $products = Product::with('users','category','brand','section')->where('user_id',$user_id)->get();
      $products=json_decode(json_encode($products));
      return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $categories = ChildCategory::with('categories')->get();
        $categories = json_decode(json_encode($categories),true);
        $brands = Brand::get();
        $brands = json_decode(json_encode($brands),true);
        // echo "<pre>";print_r($categories);die();
      return view('admin.product.create',compact('categories','brands'));
    }

    public function insert(Request $request)
    {
      $user_id = Auth::guard('admin')->user()->id;
      
        if ($request->isMethod('post')) {
            $data = $request->all();
            $product = new Product;
              $categoryDeatils = Category::find($data['category_id']);
            //echo "<pre>";print_r($categoryDeatils);die();
              $product->section_id = $categoryDeatils['section_id'];
             $product->category_id = $data['category_id'];
            //  echo "<prr>";print_r($product);die();
            $product->brand_id = $data['brand_id'];
              $product->product_name = $data['product_name'];
              $product->product_price = $data['product_price'];
             $product->product_discount = $data['product_discount'];
          
        
              $product->product_color = $data['product_color'];
              $product->product_code = $data['product_code'];
              $product->description = $data['description'];
              $product->user_id = Auth::guard('admin')->user()->id;
           
       
              // $product->url = $data['url'];
              $product->meta_title = $data['meta_title'];
        
             $product->meta_description = $data['meta_description'];
             $product->slug = Str::slug($data['product_name']);
             if ($request->hasFile('main_image')) {
               $image_tmp = $request->file('main_image');
               if ($image_tmp->isValid()) {
               $extension = $image_tmp->getClientOriginalExtension();
               $filename=rand(111,99999).'.'.$extension;
               $large_image_path = 'images/backend_images/products/'.$filename;
       
               Image::make($image_tmp)->resize(600,600)->save($large_image_path);
                  $product->main_image =$filename;
       
               }
               }
              $product->save();
            }

          return redirect()->route('admin.product.index')->with('flash_message_success','product has added successfully');
    }

    public function updateStatus($id, $status)
      {

          $product = Product::find($id);
          $product->status = $status;
          if ($product->save()){
              echo "1";
          }else{
              echo "0";
          }

      }
    public function update(Request $request,$id)
    {
      if ($request->isMethod('post')) {
        $data = $request->all();
        $product = Product::find($id);
          $categoryDeatils = Category::find($data['category_id']);
        //echo "<pre>";print_r($categoryDeatils);die();
          $product->section_id = $categoryDeatils['section_id'];
         $product->category_id = $data['category_id'];
        //  echo "<prr>";print_r($product);die();
        $product->brand_id = $data['brand_id'];
          $product->product_name = $data['product_name'];
          $product->product_price = $data['product_price'];
         $product->product_discount = $data['product_discount'];
      
    
          $product->product_color = $data['product_color'];
          $product->product_code = $data['product_code'];
          $product->description = $data['description'];
          $product->stock = $data['stock'];
   
          // $product->url = $data['url'];
          $product->meta_title = $data['meta_title'];
    
         $product->meta_description = $data['meta_description'];
         $product->slug = Str::slug($data['product_name']);
         if ($request->hasFile('main_image')) {
           $image_tmp = $request->file('main_image');
           if ($image_tmp->isValid()) {
           $extension = $image_tmp->getClientOriginalExtension();
           $filename=rand(111,99999).'.'.$extension;
           $large_image_path = 'images/backend_images/products/'.$filename;
   
           Image::make($image_tmp)->resize(600,600)->save($large_image_path);
              $product->main_image =$filename;
   
           }
           }
          $product->save();
          return redirect()->route('admin.product.index')->with('flash_message_success','product has update successfully');
        }

      $product = Product::where('id',$id)->first();
      $categories = ChildCategory::with('categories')->get();
      $categories = json_decode(json_encode($categories),true);
      $brands = Brand::get();
      $brands = json_decode(json_encode($brands),true);
      return view('admin.product.edit',compact('product','categories','brands'));
    }

    public function delete($id)
    {
      $product = Product::where(['id'=>$id])->first();
    $large_image_path = 'images/backend_images/products/';


    if(file_exists($large_image_path.$product->main_image)) {
    unlink($large_image_path.$product->main_image);
    }
    $product->delete();
    return back()->with('flash_message_success','product has delete successfully');
    }


    public function productImage($id)
    {


      $productData = Product::with('images')->select('id','product_name')->find($id);
      $productData = json_decode(json_encode($productData),true);
      // echo"<pre>";print_r($productData);die();
      
      return view('admin.product.product_image',compact('productData'));
    }


    public function productImageUpload(Request $request,$id)
    {
      $this->validate($request, [

        
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        
        ]);
        
        if($request->hasfile('images'))
         {
        
            foreach($request->file('images') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'images/backend_images/products/gallery/', $name);  
                $data[] = $name;  
            }
         }
        
         $form= new ProductGallery();
         $form->product_id =$request->product_id;
         $form->images=json_encode($data);
         
        
        $form->save();
        return redirect()->route('admin.product.index')->with('flash_message_success','product  Image has added successfully');;
    }


    public function productAttribute(Request $request,$id)
    {


      $productData = Product::with('attributes')->select('id','product_name','product_code','product_color')->find($id);
      $productData = json_decode(json_encode($productData),true);
    
      // echo"<pre>";print_r($productData);die();

      if($request->isMethod('post')) {
        $data = $request->all();
      // echo "<pre>";print_r($data); die;
        foreach($data['sku'] as $key => $val){
          if (!empty($val)) {
                $attrCountSKU = Attribute::where('sku',$val)->count();
                if ($attrCountSKU>0) {
                return back()->with('flash_message_error',' SKU already exists ! Please add another SKU');
                }
                  // $attrCountSizes = ProductAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                  // if ($attrCountSize>0) {
                  //    return redirect('/admin/product/add-attributetes/'.$id)->with('flash_message_error',' Size already exists ! Please add another Size');
                  // }
      
            $attribute = new Attribute;
            $attribute->product_id =$id;
            $attribute->sku =$val;
            $attribute->size = $data['size'][$key];
            $attribute->price = $data['price'][$key];
            $attribute->stock = $data['stock'][$key];
            $attribute->save();
      
          }
        }
        return back()->with('flash_message_success',' Product Attribute Add Successfull');
      }


      $productAttributes = Attribute::get();
      
      return view('admin.product.product_attribute',compact('productData','productAttributes'));
    }


    public function AttributeupdateStatus($id, $status)
    {

        $product = Attribute::find($id);
        $product->status = $status;
        if ($product->save()){
            echo "1";
        }else{
            echo "0";
        }

    }
}
