<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUrlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_url', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('url_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->timestamps();
            //Index
            $table->primary(['url_id', 'role_id']);
            //Keys
            $table->foreign('url_id')->references('id')->on('urls');

            $table->foreign('role_id')->references('id') ->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_url');
    }
}
