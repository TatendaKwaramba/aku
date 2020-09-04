<?php namespace App;

class LibRoles {
    public static function getRoles($sectionId){
        return Role::where('id',1)->pluck('name');
    }

    public static function testRoles(){
        $roles_array = array('admin_global', 'sales', 'it', 'toto', 'tata tata tata');
        return $roles_array;
    }
}
