<?php

use Illuminate\Database\Seeder;
use App\Permission;
use Illuminate\Database\Eloquent\Model;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        //Member
        Permission::create(array("id"=>1, "name"=>"view_member", "display_name"=>"View Member",
            "description"=>"Can view MEMBER information",
            "category"=>"members"));

        Permission::create(array("id"=>2, "name"=>"add_member", "display_name"=>"Add Member",
            "description"=>"Can add new MEMBER",
            "category"=>"members"));

        Permission::create(array("id"=>3, "name"=>"edit_member", "display_name"=>"Edit Member",
            "description"=>"Can edit MEMBER information",
            "category"=>"members"));

        Permission::create(array("id"=>4, "name"=>"transfer_member", "display_name"=>"Transfer Member",
            "description"=>"Can initiate MEMBER transfer",
            "category"=>"members"));

        Permission::create(array("id"=>5, "name"=>"flag_deceased_member", "display_name"=>"Flag Deceased Member",
            "description"=>"Can initiate flagging of deceased MEMBER",
            "category"=>"members"));

        //Tabera
        Permission::create(array("id"=>6, "name"=>"add_tabera", "display_name"=>"Add Tabera",
            "description"=>"Can add (create) new TABERA",
            "category"=>"tabera"));

        Permission::create(array("id"=>7, "name"=>"view_tabera", "display_name"=>"View Tabera",
            "description"=>"Can view TABERA information",
            "category"=>"tabera"));


        Permission::create(array("id"=>8, "name"=>"edit_tabera", "display_name"=>"Edit Tabera",
            "description"=>"Can edit (update) TABERA information",
            "category"=>"tabera"));


        //Nyika
        Permission::create(array("id"=>9,"name"=>"add_nyika", "display_name"=>"Add Nyika",
            "description"=>"Can add (create) new NYIKA",
            "category"=>"nyika"));

        Permission::create(array("id"=>10, "name"=>"view_nyika", "display_name"=>"View Nyika",
            "description"=>"Can view NYIKA information",
            "category"=>"nyika"));


        Permission::create(array("id"=>11, "name"=>"edit_nyika", "display_name"=>"Edit Nyika",
            "description"=>"Can edit (update) NYIKA information",
            "category"=>"nyika"));

        //Greater
        Permission::create(array("id"=>12, "name"=>"add_greater", "display_name"=>"Add Greater",
            "description"=>"Can add (create) new GREATER",
            "category"=>"greater"));

        Permission::create(array("id"=>13, "name"=>"view_greater", "display_name"=>"View Greater",
            "description"=>"Can view GREATER information",
            "category"=>"greater"));


        Permission::create(array("id"=>14, "name"=>"edit_greater", "display_name"=>"Edit Greater",
            "description"=>"Can edit (update) GREATER information",
            "category"=>"greater"));

        //Centre
        Permission::create(array("id"=>15, "name"=>"add_centre", "display_name"=>"Add Centre",
            "description"=>"Can add (create) new CENTRE",
            "category"=>"centre"));

        Permission::create(array("id"=>16, "name"=>"view_centre", "display_name"=>"View Centre",
            "description"=>"Can view CENTRE information",
            "category"=>"centre"));


        Permission::create(array("id"=>17, "name"=>"edit_centre", "display_name"=>"Edit Centre",
            "description"=>"Can edit (update) CENTRE information",
            "category"=>"centre"));

    }
}
