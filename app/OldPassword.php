<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OldPassword extends Model
{
    protected $fillable = array('email', 'password');

}
