<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\AdminLogo;
use Image;
use File;

class DashboardLogoController extends Controller
{
    public function index()
    {

      $adminLogos = AdminLogo::get();
      return view('admin.adminLogo.index',compact('adminLogos'));
    }

    public function create()
    {
      return view('admin.adminLogo.create');
    }

    public function insert(Request $request)
    {
      $adminLogo = new adminLogo();
      if ($request->hasFile('logo')) {
        $image_tmp = $request->file('logo');
        if ($image_tmp->isValid()) {
        $extension = $image_tmp->getClientOriginalExtension();
        $filename=rand(111,99999).'.'.$extension;
        $large_image_path = 'images/backend_images/adminLogos/'.$filename;

        Image::make($image_tmp)->resize(600,600)->save($large_image_path);
           $adminLogo->logo =$filename;

        }
        }
        $adminLogo->save();
          return redirect()->route('admin.dashboardlogo.index')->with('flash_message_success','adminLogo has added successfully');
    }

    public function updateStatus($id, $status)
      {

          $adminLogo = AdminLogo::find($id);
          $adminLogo->status = $status;
          if ($adminLogo->save()){
              echo "1";
          }else{
              echo "0";
          }

      }
    public function update(Request $request,$id)
    {
      if ($request->isMethod('post')) {
        $data = $request->all();
        $adminLogo = AdminLogo::find($id);
        if ($request->hasFile('logo')) {
          $image_tmp = $request->file('logo');
          if ($image_tmp->isValid()) {
          $extension = $image_tmp->getClientOriginalExtension();
          $filename=rand(111,99999).'.'.$extension;
          $large_image_path = 'images/backend_images/adminLogos/'.$filename;

          Image::make($image_tmp)->resize(600,600)->save($large_image_path);
             $adminLogo->logo =$filename;

          }
          }
          $adminLogo->save();
          return redirect()->route('admin.dashboardlogo.index')->with('flash_message_success','adminLogo has update successfully');
      }

      $adminLogo = AdminLogo::where('id',$id)->first();
      return view('admin.adminLogo.edit',compact('adminLogo'));
    }

    public function delete($id)
    {
      $adminLogo = AdminLogo::find($id);
    if (!is_null($adminLogo)) {
      if (File::exists(public_path('images/backend_images/adminLogos/').$adminLogo->image)) {
        File::delete(public_path('images/backend_images/adminLogos/').$adminLogo->image);
      }
    }
    $adminLogo->delete();
    return back()->with('flash_message_success','adminLogo has delete successfully');
    }
}
