<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\MiddleBanner;
use Image;
use File;

class MiddleBannerController extends Controller
{
    public function index()
    {

      $midddleBanners = MiddleBanner::get();
      return view('admin.middle_banner.index',compact('midddleBanners'));
    }

    public function create()
    {
      return view('admin.middle_banner.create');
    }

    public function insert(Request $request)
    {
      $midddleBanner = new MiddleBanner();
      $midddleBanner->title = $request->title;
      $midddleBanner->description = $request->description;
      $midddleBanner->slug = Str::slug($request->title);
      if ($request->hasFile('image')) {
        $image_tmp = $request->file('image');
        if ($image_tmp->isValid()) {
        $extension = $image_tmp->getClientOriginalExtension();
        $filename=rand(111,99999).'.'.$extension;
        $large_image_path = 'images/backend_images/middleBanners/'.$filename;

        Image::make($image_tmp)->resize(1349,145)->save($large_image_path);
           $midddleBanner->image =$filename;

        }
        }
        $midddleBanner->save();
          return redirect()->route('admin.middle-banner.index')->with('flash_message_success','Banner has added successfully');
    }

    public function updateStatus($id, $status)
      {

          $midddleBanner = MiddleBanner::find($id);
          $midddleBanner->status = $status;
          if ($midddleBanner->save()){
              echo "1";
          }else{
              echo "0";
          }

      }
    public function update(Request $request,$id)
    {
      if ($request->isMethod('post')) {
        $data = $request->all();
        $midddleBanner = MiddleBanner::find($id);
        $midddleBanner->title = $request->title;
        $midddleBanner->description = $request->description;
        $midddleBanner->slug = Str::slug($request->title);
        if ($request->hasFile('image')) {
          $image_tmp = $request->file('image');
          if ($image_tmp->isValid()) {
          $extension = $image_tmp->getClientOriginalExtension();
          $filename=rand(111,99999).'.'.$extension;
          $large_image_path = 'images/backend_images/middleBanners/'.$filename;

          Image::make($image_tmp)->resize(1349,145)->save($large_image_path);
             $midddleBanner->image =$filename;

          }
          }
          $midddleBanner->save();
          return redirect()->route('admin.middle-banner.index')->with('flash_message_success','Banner has update successfully');
      }

      $midddleBanner = MiddleBanner::where('id',$id)->first();
      return view('admin.middle_banner.edit',compact('midddleBanner'));
    }

    public function delete($id)
    {
      $midddleBanner = MiddleBanner::find($id);
    if (!is_null($midddleBanner)) {
      if (File::exists(public_path('images/backend_images/banners/').$midddleBanner->image)) {
        File::delete(public_path('images/backend_images/banners/').$midddleBanner->image);
      }
    }
    $midddleBanner->delete();
    return back()->with('flash_message_success','Banner has delete successfully');
    }
}
