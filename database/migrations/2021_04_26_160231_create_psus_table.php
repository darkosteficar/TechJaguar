<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->float('price',12,2);
            $table->foreignId('manufacturer_id')->constrained()->onDelete('cascade');
            $table->string('efficiency_rating',20);
            $table->integer('molex_4pin_connectors');
            $table->integer('sata_connectors');
            $table->integer('pcie_6_2_pin_connectors');
            $table->integer('length');
            $table->string('type');
            $table->string('modular',15);
            $table->integer('wattage');
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
        Schema::dropIfExists('psus');
    }
}
