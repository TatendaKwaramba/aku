<?php

use Illuminate\Database\Seeder;
use App\Role;
use Illuminate\Database\Eloquent\Model;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        Role::create(array("id"=>1, "name"=>"admin_global", "display_name"=>"Admin Global", "description"=>"Super platform administrator"));
        Role::create(array("id"=>2, "name"=>"call_center", "display_name"=>"Call Center", "description"=>"Call centre"));
        Role::create(array("id"=>3, "name"=>"call_center_sup", "display_name"=>"Call Center Supervisor", "description"=>"Call center supervisor"));
        Role::create(array("id"=>4, "name"=>"tech_admin", "display_name"=>"Tech Admin", "description"=>"IT tech administrator"));
        Role::create(array("id"=>5, "name"=>"treasury", "display_name"=>"Treasury", "description"=>"Treasury department"));
        Role::create(array("id"=>6, "name"=>"treasury_assistant", "display_name"=>"Treasury Assistant", "description"=>"Treasury assistant"));
        Role::create(array("id"=>7, "name"=>"sponsor_bank", "display_name"=>"Sponsor Bank", "description"=>"Sponsor bank"));
        Role::create(array("id"=>8, "name"=>"sponsor_bank_accounting", "display_name"=>"Sponsor Bank Accounting", "description"=>"Sponsor bank accounting"));
        Role::create(array("id"=>9, "name"=>"sponsor_bank_deposits", "display_name"=>"Sponsor Bank Deposits", "description"=>"Sponsor bank deposits"));
        Role::create(array("id"=>10, "name"=>"rbz", "display_name"=>"Reserve Bank", "description"=>"RBZ"));
        Role::create(array("id"=>11, "name"=>"sales", "display_name"=>"Sales", "description"=>"Sales"));
        Role::create(array("id"=>12, "name"=>"management", "display_name"=>"Management", "description"=>"Management"));
    }
}
