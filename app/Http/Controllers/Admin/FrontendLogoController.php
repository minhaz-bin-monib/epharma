<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\FrontLogo;
use Image;
use File;

class FrontendLogoController extends Controller
{
    public function index()
    {

      $frontLogos = FrontLogo::get();
      return view('admin.frontLogo.index',compact('frontLogos'));
    }

    public function create()
    {
      return view('admin.frontLogo.create');
    }

    public function insert(Request $request)
    {
      $frontLogo = new FrontLogo();
      if ($request->hasFile('logo')) {
        $image_tmp = $request->file('logo');
        if ($image_tmp->isValid()) {
        $extension = $image_tmp->getClientOriginalExtension();
        $filename=rand(111,99999).'.'.$extension;
        $large_image_path = 'images/backend_images/frontLogos/'.$filename;

        Image::make($image_tmp)->resize(200,70)->save($large_image_path);
           $frontLogo->logo =$filename;

        }
        }
        $frontLogo->save();
          return redirect()->route('admin.frontendlogo.index')->with('flash_message_success','frontLogo has added successfully');
    }

    public function updateStatus($id, $status)
      {

          $frontLogo = FrontLogo::find($id);
          $frontLogo->status = $status;
          if ($frontLogo->save()){
              echo "1";
          }else{
              echo "0";
          }

      }
    public function update(Request $request,$id)
    {
      if ($request->isMethod('post')) {
        $data = $request->all();
        $frontLogo = FrontLogo::find($id);
        if ($request->hasFile('logo')) {
          $image_tmp = $request->file('logo');
          if ($image_tmp->isValid()) {
          $extension = $image_tmp->getClientOriginalExtension();
          $filename=rand(111,99999).'.'.$extension;
          $large_image_path = 'images/backend_images/frontLogos/'.$filename;

          Image::make($image_tmp)->resize(200,70)->save($large_image_path);
             $frontLogo->logo =$filename;

          }
          }
          $frontLogo->save();
          return redirect()->route('admin.frontendlogo.index')->with('flash_message_success','frontLogo has update successfully');
      }

      $frontLogo = FrontLogo::where('id',$id)->first();
      return view('admin.frontLogo.edit',compact('frontLogo'));
    }

    public function delete($id)
    {
      $frontLogo = FrontLogo::find($id);
    if (!is_null($frontLogo)) {
      if (File::exists(public_path('images/backend_images/frontLogos/').$frontLogo->image)) {
        File::delete(public_path('images/backend_images/frontLogos/').$frontLogo->image);
      }
    }
    $frontLogo->delete();
    return back()->with('flash_message_success','frontLogo has delete successfully');
    }
}
