<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App;

class UrlController extends Controller
{
    //
    public static function getUrls()
    {
        return array('urls' => App\Url::all());
    }

    public function createUrl($base)
    {
        $url = new App\Url();
        $url->base = $base;

        $res = $url->save();
        if ($res) {
            return array('code' => '00', 'description' => 'Success');
        }
        return array('code' => '01', 'description' => 'Failure');
    }

    public function deleteUrl($id)
    {
        $res = App\Url::destroy($id);
        if ($res) {
            return array('code' => '00', 'description' => 'Success');
        }
        return array('code' => '01', 'description' => 'Failure');
    }

    public function addRole($url_id, $role_id)
    {
        if (App\Role::find($role_id) == null) {
            return array('code' => '01', 'description' => 'The role does not exist');
        }

        $url = App\Url::find($url_id);

        if ($url == null) {
            return array('code' => '01', 'description' => 'The url does not exist');
        }

        if ($url->hasRole($role_id)) {
            return array('code' => '01', 'description' => 'Url already has role applied');
        }


        $url->roles()->attach($role_id);

        return array('code' => '00', 'description' => 'Success');

    }

    public function removeRole($url_id, $role_id)
    {

        if (App\Role::find($role_id) == null) {
            return array('code' => '01', 'description' => 'The role does not exist');
        }

        $url = App\Url::find($url_id);

        if ($url == null) {
            return array('code' => '01', 'description' => 'The url does not exist');
        }

        //return $url->roles;
        if (!$url->hasRole($role_id)) {
            return array('code' => '01', 'description' => 'Relation does not exist');
        }


        $url->roles()->detach($role_id);

        return array('code' => '00', 'description' => 'Success');
    }

    public function addPermission($url_id, $perm_id)
    {
        if (App\Permission::find($perm_id) == null) {
            return array('code' => '01', 'description' => 'The permission does not exist');
        }

        $url = App\Url::find($url_id);

        if ($url == null) {
            return array('code' => '01', 'description' => 'The url does not exist');
        }

        if ($url->hasPermission($perm_id)) {
            return array('code' => '01', 'description' => 'Url already has permission applied');
        }


        $url->permissions()->attach($perm_id);

        return array('code' => '00', 'description' => 'Success');

    }

    public function removePermission(Request $request)
    {

    }

    //Permission for ui urls
    public static function getRolesForUrl($url_id){
        $url = App\Url::find($url_id);
        if($url == null){
            return App\Role::where('name', 'admin_global')->pluck('name')->toArray();
        }
        $roles = $url->roles->pluck('name')->toArray();
        $roles = array_prepend($roles, 'admin_global');
        return $roles;
    }

    //Permission for ui urls
    public static function getRolesUrl($url_id){
        $url = App\Url::find($url_id);
        if($url == null){
            return App\Role::where('name', 'admin_global')->get();
        }
        $roles = $url->roles;
        //$roles = array_prepend($roles, 'admin_global');
        return $roles;
    }


}
