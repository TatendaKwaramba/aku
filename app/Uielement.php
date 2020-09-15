<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uielement extends Model
{
    //
    protected $dates = ['created_at', 'updated_at'];

    public function roles(){
        return $this->belongsToMany('App\Role', 'role_uielement');
    }

    public function urls(){
        return $this->belongsToMany('App\Url', 'url_uielement');
    }

    public function hasRole($role_id){
        foreach ($this->roles as $role){
            if($role->id == $role_id){
                return true;
            }
        }

        return false;
    }
}
