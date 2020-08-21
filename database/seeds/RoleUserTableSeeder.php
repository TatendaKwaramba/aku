<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\RoleUser;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        RoleUser::create(array("user_id"=>1, "role_id"=>1));
        RoleUser::create(array("user_id"=>2, "role_id"=>2));
        RoleUser::create(array("user_id"=>3, "role_id"=>1));

    }
}
