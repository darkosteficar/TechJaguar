<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->float('price',12,2);
            $table->foreignId('manufacturer_id')->constrained()->onDelete('cascade');
            $table->string('socket',15);
            $table->float('base_clock');
            $table->float('boost_clock');
            $table->integer('tdp');
            $table->integer('microarchitecture');
            $table->integer('core_count');
            $table->integer('litography');
            $table->string('series', 20);
            $table->string('core_family',30);
            $table->boolean('integrated_graphics');
            $table->boolean('smt');
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
        Schema::dropIfExists('cpus');
    }
}
