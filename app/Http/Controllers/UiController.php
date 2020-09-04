<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App;

class UiController extends Controller
{
    //
    public static function getElements()
    {
        return array('elements' => App\Uielement::all());
    }

    public function createElement($name)
    {
        $element = new App\Uielement();
        $element->name = $name;

        $res = $element->save();
        if ($res) {
            return array('code' => '00', 'description' => 'Success');
        }
        return array('code' => '01', 'description' => 'Failure');
    }

    public function deleteElement($id)
    {
        $res = App\Uielement::destroy($id);
        if ($res) {
            return array('code' => '00', 'description' => 'Success');
        }
        return array('code' => '01', 'description' => 'Failure');
    }

    public function addRole($element_id, $role_id)
    {
        if (App\Role::find($role_id) == null) {
            return array('code' => '01', 'description' => 'The role does not exist');
        }

        $element = App\Uielement::find($element_id);

        if (App\Uielement::find($element_id) == null) {
            return array('code' => '01', 'description' => 'The element does not exist');
        }

        if ($element->hasRole($role_id)) {
            return array('code' => '01', 'description' => 'Element already has role applied');
        }


        $element->roles()->attach($role_id);

        return array('code' => '00', 'description' => 'Success');

    }

    public function removeRole($element_id, $role_id)
    {

        if (App\Role::find($role_id) == null) {
            return array('code' => '01', 'description' => 'The role does not exist');
        }

        $element = App\Uielement::find($element_id);

        if ($element == null) {
            return array('code' => '01', 'description' => 'The element does not exist');
        }

        //return $element->roles;
        if (!$element->hasRole($role_id)) {
            return array('code' => '01', 'description' => 'Relation does not exist');
        }


        $element->roles()->detach($role_id);

        return array('code' => '00', 'description' => 'Success');
    }

    public function addPermission($element_id, $perm_id)
    {
        if (App\Permission::find($perm_id) == null) {
            return array('code' => '01', 'description' => 'The permission does not exist');
        }

        $element = App\Uielement::find($element_id);

        if (App\Uielement::find($element_id) == null) {
            return array('code' => '01', 'description' => 'The element does not exist');
        }

        if ($element->hasPermission($perm_id)) {
            return array('code' => '01', 'description' => 'Element already has permission applied');
        }


        $element->permissions()->attach($perm_id);

        return array('code' => '00', 'description' => 'Success');

    }

    public function removePermission(Request $request)
    {

    }

    //Permission for ui elements
    public static function getRolesForElement($element_id){
        $element = App\Uielement::find($element_id);
        if($element == null){
            return App\Role::where('name', 'admin_global')->pluck('name')->toArray();
        }
        $roles = $element->roles->pluck('name')->toArray();
        $roles = array_prepend($roles, 'admin_global');
        return $roles;
    }

    //Permission for ui elements
    public static function getRolesUiElement($element_id){
        $element = App\Uielement::find($element_id);
        if($element == null){
            return App\Role::where('name', 'admin_global')->get();
        }
        $roles = $element->roles;
        //$roles = array_prepend($roles, 'admin_global');
        return $roles;
    }

    public static function getUrlsElement($element_id){
        $element = App\Uielement::find($element_id);
        if($element == null){
            return App\Role::where('name', 'admin_global')->get();
        }
        return $element->urls;
    }
}
