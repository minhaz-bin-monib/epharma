<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Authenticatable
{
    use Notifiable;
    protected $guard='vendor';
    protected $fillable=['name','email','password','is_admin','created_at','update_at'];
    protected $hidden=['password','remember_token'];
}
