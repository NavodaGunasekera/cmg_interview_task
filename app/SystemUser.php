<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemUser extends Model
{
    //
    protected $fillable = ['fname','lname','dob','gender','email','phone','password'];
}
