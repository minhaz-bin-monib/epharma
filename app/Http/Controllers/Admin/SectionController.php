<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ChildCategory;


class SectionController extends Controller
{
    public function index()
    {

      $sections = ChildCategory::get();
      return view('admin.section.index',compact('sections'));
    }

    public function create()
    {
      return view('admin.section.create');
    }

    public function insert(Request $request)
    {
      $section = new ChildCategory();
      $section->name = $request->name;
      $section->slug = Str::slug($request->name);

        $section->save();
          return redirect()->route('admin.section.index')->with('flash_message_success','ChildCategory has added successfully');
    }

    public function updateStatus($id, $status)
      {

          $section = ChildCategory::find($id);
          $section->status = $status;
          if ($section->save()){
              echo "1";
          }else{
              echo "0";
          }

      }
    public function update(Request $request,$id)
    {
      if ($request->isMethod('post')) {
        $data = $request->all();
        $section = ChildCategory::find($id);
        $section->name = $data['name'];

          $section->save();
          return redirect()->route('admin.section.index')->with('flash_message_success','ChildCategory has update successfully');
      }

      $section = ChildCategory::where('id',$id)->first();
      return view('admin.section.edit',compact('section'));
    }

    public function delete($id)
    {
      $section = ChildCategory::where(['id'=>$id])->delete();

    return back()->with('flash_message_success','ChildCategory has delete successfully');
    }
}
