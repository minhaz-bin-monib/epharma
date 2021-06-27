<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Brand;
use Image;

class BrandController extends Controller
{
    public function index()
    {

      $brands = Brand::get();
      return view('admin.brand.index',compact('brands'));
    }

    public function create()
    {
      return view('admin.brand.create');
    }

    public function insert(Request $request)
    {
      $brand = new Brand();
      $brand->name = $request->name;
      $brand->slug = Str::slug($request->name);
      if ($request->hasFile('image')) {
        $image_tmp = $request->file('image');
        if ($image_tmp->isValid()) {
        $extension = $image_tmp->getClientOriginalExtension();
        $filename=rand(111,99999).'.'.$extension;
        $large_image_path = 'images/backend_images/brands/'.$filename;

        Image::make($image_tmp)->resize(600,600)->save($large_image_path);
           $brand->image =$filename;

        }
        }
        $brand->save();
          return redirect()->route('admin.brand.index')->with('flash_message_success','Brand has added successfully');
    }

    public function updateStatus($id, $status)
      {

          $brand = Brand::find($id);
          $brand->status = $status;
          if ($brand->save()){
              echo "1";
          }else{
              echo "0";
          }

      }
    public function update(Request $request,$id)
    {
      if ($request->isMethod('post')) {
        $data = $request->all();
        $brand = Brand::find($id);
        $brand->name = $data['name'];
        if ($request->hasFile('image')) {
          $image_tmp = $request->file('image');
          if ($image_tmp->isValid()) {
          $extension = $image_tmp->getClientOriginalExtension();
          $filename=rand(111,99999).'.'.$extension;
          $large_image_path = 'images/backend_images/brands/'.$filename;

          Image::make($image_tmp)->resize(600,600)->save($large_image_path);
             $brand->image =$filename;

          }
          }
          $brand->save();
          return redirect()->route('admin.brand.index')->with('flash_message_success','Brand has update successfully');
      }

      $brand = Brand::where('id',$id)->first();
      return view('admin.brand.edit',compact('brand'));
    }

    public function delete($id)
    {
      $brand = Brand::where(['id'=>$id])->first();
    $large_image_path = 'images/backend_images/brands/';


    if(file_exists($large_image_path.$brand->image)) {
    unlink($large_image_path.$brand->image);
    }
    $brand->delete();
    return back()->with('flash_message_success','Brand has delete successfully');
    }
}
