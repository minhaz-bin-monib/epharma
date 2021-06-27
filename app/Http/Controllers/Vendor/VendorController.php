<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
class VendorController extends Controller
{

    public function index()
    {
       return view('vendor.dashboard');
    }

    public function logout()
    {
      
      Auth::guard('vendor')->logout();
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
  if (Auth::guard('vendor')->attempt(['email'=>$data['email'],'password'=>$data['password']])) {
  return redirect('vendor/dashboard')->with('flash_message_success','Login Successfully !');
  }else {
    return redirect()->back()->with('flash_message_error','Invalid Email or Password');
  }
  
      }
    return view('vendor.vendor_login');
    }
}
