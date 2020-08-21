<?php

use Illuminate\Database\Seeder;
use App\Uielement;

class UiElementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('uielements')->delete();

        Uielement::create(array("id"=>1, "name"=>"dashboard"));

        Uielement::create(array("id"=>21, "name"=>"View Subscriber"));
        Uielement::create(array("id"=>22, "name"=>"Update Subscriber"));

        Uielement::create(array("id"=>31, "name"=>"Add Business"));
        Uielement::create(array("id"=>32, "name"=>"View Business"));
        Uielement::create(array("id"=>33, "name"=>"Add Business Supervisor"));
        Uielement::create(array("id"=>34, "name"=>"View Business Supervisor"));
        Uielement::create(array("id"=>35, "name"=>"eValue Validation"));
        Uielement::create(array("id"=>36, "name"=>"Pending Bank Transfers"));

        Uielement::create(array("id"=>41, "name"=>"Add Biller"));
        Uielement::create(array("id"=>42, "name"=>"View Biller"));

        Uielement::create(array("id"=>51, "name"=>"Add Bank"));
        Uielement::create(array("id"=>52, "name"=>"View Bank"));

        Uielement::create(array("id"=>61, "name"=>"accounts summary of balance"));
        Uielement::create(array("id"=>62, "name"=>"accounts statements"));
        Uielement::create(array("id"=>63, "name"=>"accounts adjustments"));
        Uielement::create(array("id"=>64, "name"=>"accounts business settlement"));

        Uielement::create(array("id"=>71, "name"=>"reports dashboard"));
        Uielement::create(array("id"=>72, "name"=>"reports transaction"));
        Uielement::create(array("id"=>73, "name"=>"reports sms_logs"));
        Uielement::create(array("id"=>74, "name"=>"reports emails"));
        Uielement::create(array("id"=>75, "name"=>"reports notifications"));

        Uielement::create(array("id"=>81, "name"=>"Add Product"));
        Uielement::create(array("id"=>82, "name"=>"View Product"));

        Uielement::create(array("id"=>91, "name"=>"Add Device"));
        Uielement::create(array("id"=>92, "name"=>"View Devices"));

        Uielement::create(array("id"=>101, "name"=>"Admin Settings"));
        Uielement::create(array("id"=>102, "name"=>"Roles Settings"));
        Uielement::create(array("id"=>103, "name"=>"Add Roles"));
        Uielement::create(array("id"=>104, "name"=>"Add Class of Service"));
        Uielement::create(array("id"=>105, "name"=>"View System Matrix"));
        Uielement::create(array("id"=>106, "name"=>"View Pending Administrators"));
        Uielement::create(array("id"=>107, "name"=>"View Fees and Commissions"));
    }
}
