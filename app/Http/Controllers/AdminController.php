<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //Get
	const USER_STATE_ACTIVE = 1;
	const USER_STATE_OLD = 9;

	public function getAllUsers(){
        $users = App\User::with('roles')
            ->whereStatus(self::USER_STATE_ACTIVE)
            ->get();
        return array('users' => $users);
    }

	public function terminatedEmployees(){
		$users = App\User::with('roles')
			->whereStatus(9)
			->get();
		return array('users' => $users);
	}

	/**
	 * @param Request $request
	 * @return array
	 */
	public function terminateEmployee(Request $request){

		$validator = Validator::make($request->all(), [
			'password' => 'required',
			'id' => 'required | integer | exists:users,id',
		]);
		if($validator->fails()){
			return array("data"=>$validator->errors(), "code"=> 1);
		}


		if (Hash::check($request->input('password'), Auth::user()->password)) {
			// The passwords match...
		}else{
			return array("data"=>"Wrong Password for current user.\nThe incident has been recorded", "code"=> 1);
		}

		$userId = $request->input("id");
		$user = User::find($userId);
		$user->status = self::USER_STATE_OLD;
		$user->password = bcrypt(Str::random(60)); //change password to an unknown value

		if($user->save()){
			return array("data"=>"User Deactivated", "code"=>0);
		}else{
			return array("data"=>"The system failed to update.\nPlease contact admin", "code"=>2);
		}
	}

    public function getUsers(){
        return App\User::all();
    }

    public function getPendingUsers(){
        $users = App\User::with('roles')
            ->whereStatus(null)
            ->get();
        return array('users' => $users);
    }

    public function getAllRoles(){
        $roles = App\Role::all();
        return array('roles' => $roles);
    }

    public function getRolesForMatrix(){
        $roles = App\Role::where('name', '<>','admin_global')->get();
        return array('roles' => $roles);
    }

    public function getAllElements(){
        $elements = App\Uielement::with('roles')->get();
        return array('elements' => $elements);
    }

    public function getAllPerms(){
        $perms = App\Permission::orderBy('category')->get();
        $result = array();
        foreach ($perms as $perm){
            array_push($result, array("id"=>$perm->id,"category"=>$perm->category,"name"=>$perm->name,"display_name"=>$perm->display_name,
                "description"=>$perm->description,"created_at"=>$perm->created_at,"updated_at"=>$perm->updated_at->format('d M Y - H:i:s')));
        }
        return array('perms' => $perms);
    }

    //***************
    public function createRole(Request $request){
        if(!$request->has('display_name')){
            return array('code'=>'01', 'description'=>'Invalid parameters');
        }
        if(!$request->has('description')){
            return array('code'=>'01', 'description'=>'Invalid parameters');
        }

        $display_name = $request->input('display_name');
        $description = $request->input('description');
        $name = Str::snake(Str::lower($display_name));

        $role = new App\Role();
        $role->name = $name;
        $role->display_name = $display_name;
        $role->description = $description;

        if(App\Role::where('name', $name)->count() != 0){
            return array('code'=>'01', 'description'=>'Role already exists');
        }

        $res = $role->save();
        if(!$request->has('perms')){

        }else{
            $role = App\Role::where('name', $name)->first(); //Retrieve from DB, where it will have id
            if($role == null)  return array('code'=>'01', 'description'=>'Failed to attach roles. Try to edit the Role separately');

            $perms = $request->input('perms');
            $array = json_decode($perms);

            foreach($array as $perm){
                //add perm
                $role->attachPermission($perm);
                //return array('code'=>'01', 'description'=>$perm);
            }
        }

        if($res){
            return array('code'=>'00', 'description'=>'Success');
        }
        return array('code'=>'01', 'description'=>'Failure');


    }

    public function userAttachRole(Request $request){
        $user_id = $request->input('user_id');
        $role_id = $request->input('role_id');

        $role = App\Role::find($role_id);
        if($role == null){
            return  array('code' => '01', 'description' => 'Role does not exist');
        }

        $user = App\User::find($user_id);
        if($user == null){
            return  array('code' => '01', 'description' => 'User does not exist');
        }
        if($user->hasRole($role->name)){
            return array('code' => '01', 'description' => 'User already has role : ' . $role->name);
        }
        $user->attachRole($role_id);

        if($user->hasRole($role->name)){
            return array('code' => '00', 'description' => 'Success');
        }
    }

    public function userDetachRole(Request $request){
        $user_id = $request->input('user_id');
        $role_id = $request->input('role_id');

        $role = App\Role::find($role_id);
        if($role == null){
            return array('code'=>'01', 'description'=>'Role does not exist');
        }

        $user = App\User::find($user_id);
        if($user == null){
            return array('code' => '01', 'description' => 'User does not exist');
        }
        if(! $user->hasRole($role->name)){
            return array('code' => '01', 'description' => 'User does not have role : ' . $role->name);
        }

        $user->detachRole($role_id);

        if(! $user->hasRole($role->name)){
            return array('code' => '00', 'description' => 'Success');
        }
    }

    public function roleAttachPerm(Request $request){
        $perm_id = $request->input('perm_id');
        $role_id = $request->input('role_id');

        $role = App\Role::find($role_id);
        if($role == null){
            return  array('code' => '01', 'description' => 'Role does not exist');
        }

        $perm = App\Permission::find($perm_id);
        if($perm == null){
            return  array('code' => '01', 'description' => 'Permission does not exist');
        }
        if($role->hasPermission($perm->name)){
            return array('code' => '01', 'description' => 'Role already has permission : ' . $perm->name);
        }
        $role->attachPermission($perm_id);

        if($role->hasPermission($perm->name)){
            return array('code' => '00', 'description' => 'Success');
        }
    }

    public function roleDetachPerm(Request $request){
        $perm_id = $request->input('perm_id');
        $role_id = $request->input('role_id');

        $role = App\Role::find($role_id);
        if($role == null){
            return array('code'=>'01', 'description'=>'Role does not exist');
        }

        $perm = App\Permission::find($perm_id);
        if($perm == null){
            return array('code' => '01', 'description' => 'Permission does not exist');
        }
        if(! $role->hasPermission($perm->name)){
            return array('code' => '01', 'description' => 'Role does not have permission : ' . $perm->name);
        }
        $role->detachPermission($perm_id);

        if(! $role->hasPermission($perm->name)){
            return array('code' => '00', 'description' => 'Success');
        }
    }

    public function roleConfigurePermissions(Request $request){
        $role_id = $request->input('role');
        $role = App\Role::find($role_id);
        if($role == null){
            return array('code'=>'01', 'description'=>'Role does not exist');
        }
        $permissions_array = $request->input('permissions');
       //todo
    }

    public function createPermission(Request $request){

        $display_name = $request->input('display_name');
        $description = $request->input('description');
        $category = Str::snake($request->input('category'));
        $name = Str::snake($category.'_'.$display_name);

        $permission = new App\Permission();
        $permission->name = $name;
        $permission->display_name = $display_name;
        $permission->description = $description;
        $permission->category = $category;

        if(App\Permission::where('name', $name)->count() != 0){
            return array('code'=>'01', 'description'=>'Permission exists');
        }
        $res = $permission->save();

        if($res){
            return array('code'=>'00', 'description'=>'Success');
        }
        return array('code'=>'01', 'description'=>'Failure');
    }

    public function deleteUser($id){
        $user = App\User::find($id);
        if($user != null){
            $res = $user->delete(); //This is a PERMANENT delete. No trace will be left
            if($res){
                return array('code'=>'00', 'description'=>'Success');
            }
            return array('code'=>'01', 'description'=>'Failure');
        }
    }

    public function deleteRole($id){
        $role = App\Role::find($id);
        if($role != null){
            $res = $role->forceDelete(); //This is a soft delete, the entry is still in the table.
            if($res){
                return array('code'=>'00', 'description'=>'Success');
            }
            return array('code'=>'01', 'description'=>'Failure');
        }
    }

    public  function deletePermission($id){
        $permission = App\Permission::find($id);
        if($permission != null){
            $res = $permission->forceDelete(); //This is a soft delete, the entry is still in the table
            if($res){
                return array('code'=>'00', 'description'=>'Success');
            }
            return array('code'=>'01', 'description'=>'Failure');
        }
    }

    public function deletePending(Request $request){
        if(!$request->has('i')){
            return array("d"=>"Bad Request", "c"=> 1);
        }

        if(!$request->has('p')){
            return array("d"=>"Bad Request", "c"=> 1);
        }

        if (Hash::check($request->input('p'), Auth::user()->password)) {
            // The passwords match...
        }else{
            return array("d"=>"Wrong Password for current user.\nThe incident has been recorded", "c"=> 1);
        }

        $userId = $request->input("i");

        if(User::destroy($userId)){
            return array("d"=>"User Deleted", "c"=>0);
        }else{
            return array("d"=>"The system failed to delete.\nPlease contact admin", "c"=>2);
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function approvePending(Request $request){
        if(!$request->has('i')){
            return array("d"=>"Bad Request", "c"=> 1);
        }

        if(!$request->has('p')){
            return array("d"=>"Bad Request", "c"=> 1);
        }

        if (Hash::check($request->input('p'), Auth::user()->password)) {
            // The passwords match...
        }else{
            return array("d"=>"Wrong Password for current user.\nThe incident has been recorded", "c"=> 1);
        }

        $userId = $request->input("i");
        $user = User::find($userId);
        $user->status = self::USER_STATE_ACTIVE;
        $user->approved_by = Auth::user()->name;
        $user->approved_by_id = Auth::user()->id;
        $user->approved_at = Carbon::now();

        if($user->save()){
            //Fire event
            event(new App\Events\UserApprovedEvent($user));

            return array("d"=>"User Approved", "c"=>0);
        }else{
            return array("d"=>"The system failed to update.\nPlease contact admin", "c"=>2);
        }
    }

}
