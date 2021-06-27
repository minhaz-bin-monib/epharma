<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Banner;
use Image;
use File;

class BannerController extends Controller
{
    public function index()
    {

      $banners = Banner::get();
      return view('admin.banner.index',compact('banners'));
    }

    public function create()
    {
      return view('admin.banner.create');
    }

    public function insert(Request $request)
    {
      $banner = new Banner();
      $banner->title = $request->title;
      $banner->description = $request->description;
      $banner->slug = Str::slug($request->title);
      if ($request->hasFile('image')) {
        $image_tmp = $request->file('image');
        if ($image_tmp->isValid()) {
        $extension = $image_tmp->getClientOriginalExtension();
        $filename=rand(111,99999).'.'.$extension;
        $large_image_path = 'images/backend_images/banners/'.$filename;

        Image::make($image_tmp)->resize(1350,247)->save($large_image_path);
           $banner->image =$filename;

        }
        }
        $banner->save();
          return redirect()->route('admin.banner.index')->with('flash_message_success','Banner has added successfully');
    }

    public function updateStatus($id, $status)
      {

          $banner = Banner::find($id);
          $banner->status = $status;
          if ($banner->save()){
              echo "1";
          }else{
              echo "0";
          }

      }
    public function update(Request $request,$id)
    {
      if ($request->isMethod('post')) {
        $data = $request->all();
        $banner = Banner::find($id);
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->slug = Str::slug($request->title);
        if ($request->hasFile('image')) {
          $image_tmp = $request->file('image');
          if ($image_tmp->isValid()) {
          $extension = $image_tmp->getClientOriginalExtension();
          $filename=rand(111,99999).'.'.$extension;
          $large_image_path = 'images/backend_images/banners/'.$filename;

          Image::make($image_tmp)->resize(600,600)->save($large_image_path);
             $banner->image =$filename;

          }
          }
          $banner->save();
          return redirect()->route('admin.banner.index')->with('flash_message_success','Banner has update successfully');
      }

      $banner = Banner::where('id',$id)->first();
      return view('admin.banner.edit',compact('banner'));
    }

    public function delete($id)
    {
      $banner = Banner::find($id);
    if (!is_null($banner)) {
      if (File::exists(public_path('images/backend_images/banners/').$banner->image)) {
        File::delete(public_path('images/backend_images/banners/').$banner->image);
      }
    }
    $banner->delete();
    return back()->with('flash_message_success','Banner has delete successfully');
    }
}
