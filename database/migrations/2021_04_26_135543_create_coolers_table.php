<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoolersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coolers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->float('price',12,2);
            $table->foreignId('manufacturer_id')->constrained()->onDelete('cascade');
            $table->string('noise_level',30);
            $table->integer('max_power');
            $table->integer('width');
            $table->integer('length');
            $table->integer('height');
            $table->string('fan_rpm',15);
            $table->boolean('water_cooled');
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
        Schema::dropIfExists('coolers');
    }
}
