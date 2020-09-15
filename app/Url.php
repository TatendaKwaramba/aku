<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    //
    protected $dates = ['created_at', 'updated_at'];

    public function roles(){
        return $this->belongsToMany('App\Role', 'role_url');
    }

    public function uielements(){
        return $this->belongsToMany('App\Uielement', 'url_uielement');
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
