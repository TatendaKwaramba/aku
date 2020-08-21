<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(UiElementsSeeder::class);
        $this->call(RoleUiElementTableSeeder::class);
        $this->call(UrlsTableSeeder::class);
        $this->call(UrlUielementTableSeeder::class);
    }
}
