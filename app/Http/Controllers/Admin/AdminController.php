<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use Image;
use Session;

class AdminController extends Controller
{
   public function index()
   {
      return view('admin.dashboard');
   }
   public function logout()
   {

     Auth::guard('admin')->logout();
     return redirect('/');
    
   }

 public function login(Request $request)
  {
    // echo $password = Hash::make('12356789');die();
    if ($request->isMethod('post')) {
    $data = $request->all();
    $validatedData = $request->validate([
    'email' => ['required', 'email', 'max:255'],
    'password' => ['required'],
]);
    // echo "<pre>";print_r($data);die();
if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])) {
return redirect('admin/dashboard')->with('flash_message_success','Login Successfully !');
}else {
  return redirect()->back()->with('flash_message_error','Invalid Email or Password');
}

    }
  return view('admin.admin_login');
  }

  public function profile()
  {
    return view('admin.profile');
  }

  public function update(Request $request)
  {
    $admin_id = Auth::guard('admin')->user()->id;
    $userDetails = User::find($admin_id );
    //  echo "<pre>";print_r($userDetails);die;
    if ($request->isMethod('post') ) {

      $data = $request->all();

    $admin = User::find($admin_id);
    $admin->name = $data['name'];
    $admin->type = $data['type'];
    $admin->mobile = $data['mobile'];
    $admin->email = $data['email'];
    if ($request->hasFile('image')) {
      $image_tmp = $request->file('image');
      if ($image_tmp->isValid()) {
      $extension = $image_tmp->getClientOriginalExtension();
      $filename=rand(111,99999).'.'.$extension;
      $large_image_path = 'images/backend_images/admins/'.$filename;

      Image::make($image_tmp)->resize(600,600)->save($large_image_path);
         $admin->image =$filename;

      }
      }
    $admin->save();
    return redirect()->back()->with('flash_message_success','Profile Update Successfully!!');
  }
  }


  public function setting()
  {
    $adminDetails = User::where(['email'=>Auth::guard('admin')->user()->email])->first();
    // echo "<pre>";print_r($adminDetails);die;
   return view('admin.admin_password',compact('adminDetails'));
  }
   public function checkPass(Request $request)
   {
    $data = $request->all();
    $user = User::find(Auth::guard('admin')->user()->id);


    if(!Hash::check($data['current_pwd'], $user->password)){
       echo "false";die;
    }else{
        echo"true";die;
    }
   }


   public function updatePassword(Request $request)

    {

      $request->validate([
      
        'new_password' => ['required'],
        'confirm_password' => ['same:new_password'],
    ]);

      if($request->isMethod('post')) {
        $data = $request->all();

        $admin_id = Auth::guard('admin')->user()->id;
        
    $userDetails = User::find($admin_id );
  // echo"<pre>";print_r($userDetails);die();

   
    if(!Hash::check($data['current_pwd'], $userDetails['password'])){
      return redirect()->route('admin.setting')->with('flash_message_error',' Current password in not match ');
    }else{
 
      
      $userDetails->password = Hash::make($data['new_password']);
      
      $userDetails->save();
      return redirect()->route('admin.setting')->with('flash_message_success',' Password update Successfully');
    }
    
    }
  
  }
}
