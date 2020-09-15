<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->comment = 'Full name';
            $table->string('email')->unique()->comment = '=Username for auth';
            $table->string('password');
            $table->timestamp('password_updated')->useCurrent = true;
            $table->timestamp('logged_at')->nullable();
            $table->integer('logins')->nullable()->unsigned();
            $table->tinyInteger('status')->nullable()->comment = 'Pending=null/0, Active=1, inactive=10';
            $table->timestamp('approved_at')->nullable();
            $table->string('display_name')->nullable()->comment = 'For user prefs';
            $table->string('approved_by')->nullable()->comment = 'For records';
            $table->integer('approved_by_id')->unsigned()->nullable()->comment = 'Reference same table';
            $table->timestamp('updated_by')->nullable()->comment = 'For records';
            $table->rememberToken();
            $table->timestamps();
            //-----------------------------------
            $table->foreign('approved_by_id')
                ->references('id')->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
