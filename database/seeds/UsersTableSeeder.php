<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::unguard(true);

        DB::table('users')->delete();

        User::create(array("id"=>1, "status"=>1,"approved_at"=>\Carbon\Carbon::now(), "name"=>"Admin Global", "email" => "admin@getcash.co.zw","password" => '$2y$10$m3YpUvf8sJseB0915GttnOE6YirVstoJdOrVLwXjmF2kzXmve7FjK' ));
        User::create(array("id"=>2, "status"=>1,"approved_at"=>\Carbon\Carbon::now(),"name"=>"Dev", "email" => "toto@getcash.co.zw","password" => '$2y$10$m3YpUvf8sJseB0915GttnOE6YirVstoJdOrVLwXjmF2kzXmve7FjK' ));
        User::create(array("id"=>3, "status"=>1,"approved_at"=>\Carbon\Carbon::now(),"name"=>"Nyasha Marufu", "email" => "marufunyasha@gmail.com","password" => '$2y$10$m3YpUvf8sJseB0915GttnOE6YirVstoJdOrVLwXjmF2kzXmve7FjK' ));

    }
}
