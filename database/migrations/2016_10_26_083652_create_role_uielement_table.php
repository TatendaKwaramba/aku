<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUielementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_uielement', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('uielement_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->timestamps();

            //Indices
            $table->primary(['uielement_id', 'role_id']);

            //Foreign Keys
            $table->foreign('uielement_id')->references('id')->on('uielements')
                ->onDelete('cascade');

            $table->foreign('role_id')->references('id')->on('roles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_uielement');
    }
}
