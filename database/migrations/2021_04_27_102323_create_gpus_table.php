<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGpusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gpus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('chipset_id')->unsigned();
            $table->float('price',12,2);
            $table->foreignId('manufacturer_id')->constrained()->onDelete('cascade');
            $table->foreign('chipset_id')->references('id')->on('chipsets')->onDelete('cascade');
            $table->string('series', 20);
            $table->string('gpu_bus',15);
            $table->string('vram_type');
            $table->integer('vram');
            $table->integer('length');
            $table->integer('tdp');
            $table->integer('process_size');
            $table->integer('memory_clock');
            $table->integer('base_clock');
            $table->integer('boost_clock');
            $table->string('interface');
            $table->string('power_connector');
            $table->integer('power_req');
            $table->boolean('crossfire');
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
        Schema::dropIfExists('gpus');
    }
}
