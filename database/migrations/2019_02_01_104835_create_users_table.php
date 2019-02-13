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
            $table->increments('ID');
            $table->string('Username',15)->unique();
            $table->string('Password',32);
            $table->string('EmailAddress');
            $table->string('LastName');
            $table->string('FirstName');
            $table->string('MobileNumber');
            $table->string('LandLineNumber');
            $table->unsignedInteger('Owner');
            $table->string('BusinessPermit');
            $table->string('BusinessPermitImage')->nullable();
            $table->timestamps();
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
