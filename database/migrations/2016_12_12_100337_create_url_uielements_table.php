<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlUielementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_uielement', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('uielement_id')->unsigned();
            $table->integer('url_id')->unsigned();
            $table->timestamps();
            //Index
            $table->primary(['url_id', 'uielement_id']);
            //Keys
            $table->foreign('url_id')->references('id')->on('urls');

            $table->foreign('uielement_id')->references('id') ->on('uielements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('url_uielement');
    }
}
