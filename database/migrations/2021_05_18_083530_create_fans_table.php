<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('manufacturer_id')->constrained()->onDelete('cascade');
            $table->float('price');
            $table->integer('diameter');
            $table->string('led');
            $table->string('speed');
            $table->string('noise');
            $table->string('bearings');
            $table->string('power_connector');
            $table->float('power_consumption');
            $table->string('air_flow');
            $table->integer('life');
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
        Schema::dropIfExists('fans');
    }
}
