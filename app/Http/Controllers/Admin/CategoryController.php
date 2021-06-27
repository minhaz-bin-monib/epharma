<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\ChildCategory;
use Image;
use File;

class CategoryController extends Controller
{
    public function index()
    {

      $categories = Category::with(['section','parentCategory'])->orderBy('id','Desc')->get();;
      return view('admin.category.index',compact('categories'));
    }

    public function appendCategoriesLavel(Request $request)
  {

  $data = $request->all();
// echo "<pre>";print_r($data);die();
  $getCategories = Category::with('subcategories')->where(['section_id'=>$data['section_id'],'parent_id'=>0,'status'=>'active'])->get();
  $getCategories = json_decode(json_encode($getCategories),true);
 // echo "<pre>";print_r($getCategories);die();
  return view('admin.category.append_categories_lavel',compact('getCategories'));


  }

  public function editAppendCategoriesLavel(Request $request)
{

$data = $request->all();
// echo "<pre>";print_r($data);die();
$getCategories = Category::with('subcategories')->where(['section_id'=>$data['section_id'],'parent_id'=>0,'status'=>'active'])->get();
$getCategories = json_decode(json_encode($getCategories),true);
// echo "<pre>";print_r($getCategories);die();
return view('admin.category.edit_append_categories_lavel',compact('getCategories'));


}

    public function create()
    {
       $getsection = ChildCategory::get();
      return view('admin.category.create',compact('getsection'));
    }

    public function insert(Request $request)
    {
      $category = new Category();
      $category->parent_id = $request->parent_id;
      $category->section_id = $request->section_id;
      $category->category_name = $request->category_name;

      $category->url = $request->url;

      $category->slug = Str::slug($request->category_name);
      if ($request->hasFile('category_image')) {
        $image_tmp = $request->file('category_image');
        if ($image_tmp->isValid()) {
        $extension = $image_tmp->getClientOriginalExtension();
        $filename=rand(111,99999).'.'.$extension;
        $large_image_path = 'images/backend_images/categories/'.$filename;

        Image::make($image_tmp)->resize(296,168)->save($large_image_path);
           $category->category_image =$filename;

        }
        }
        $category->save();
          return redirect()->route('admin.category.index')->with('flash_message_success','Category has added successfully');
    }

    public function updateStatus($id, $status)
      {

          $category = Category::find($id);
          $category->status = $status;
          if ($category->save()){
              echo "1";
          }else{
              echo "0";
          }

      }
    public function update(Request $request,$id)
    {
      if ($request->isMethod('post')) {
        $data = $request->all();
        $category = Category::find($id);
        $category->parent_id = $request->parent_id;
        $category->section_id = $request->section_id;
        $category->category_name = $request->category_name;
        $category->url = $request->url;
        $category->slug = Str::slug($request->category_name);
        if ($request->hasFile('category_image')) {
          $image_tmp = $request->file('category_image');
          if ($image_tmp->isValid()) {
          $extension = $image_tmp->getClientOriginalExtension();
          $filename=rand(111,99999).'.'.$extension;
          $large_image_path = 'images/backend_images/categories/'.$filename;

          Image::make($image_tmp)->resize(600,600)->save($large_image_path);
             $category->image =$filename;

          }
          }
          $category->save();
          return redirect()->route('admin.category.index')->with('flash_message_success','Category has update successfully');
      }

      $categorydata = Category::where('id',$id)->first();
      $categorydata = json_decode(json_encode($categorydata),true);

       $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$categorydata['section_id']])->get();
  $getCategories = json_decode(json_encode($getCategories),true);
  $getsection = ChildCategory::get();
      return view('admin.category.edit',compact('categorydata','getsection','getCategories'));
    }

    public function delete($id)
    {
      $category = Category::find($id);
    if (!is_null($category)) {
      if (File::exists(public_path('images/backend_images/categories/').$category->category_image)) {
        File::delete(public_path('images/backend_images/categories/').$category->category_image);
      }
    }
    $category->delete();
    return back()->with('flash_message_success','Category has delete successfully');
    }
}
