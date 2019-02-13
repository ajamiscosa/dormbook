<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dorms', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Name', 100)->unique();
            $table->string('AddressLine1');
            $table->string('AddressLine2');
            $table->string('City');
            $table->string('Zip');
            $table->double('Latitude',6);
            $table->double('Longitude',6);
            $table->unsignedDecimal('Rate',2);
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
        Schema::dropIfExists('dorms');
    }
}
