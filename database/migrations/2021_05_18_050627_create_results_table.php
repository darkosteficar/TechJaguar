<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('cpu_id')->unsigned();
            $table->integer('app_id')->unsigned();
            $table->integer('gpu_id')->unsigned();
            $table->integer('mobo_id')->unsigned();
            $table->integer('ram_id')->unsigned();
            $table->foreign('cpu_id')->references('id')->on('cpus')->onDelete('cascade');
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
            $table->foreign('gpu_id')->references('id')->on('gpus')->onDelete('cascade');
            $table->foreign('mobo_id')->references('id')->on('mobos')->onDelete('cascade');
            $table->foreign('ram_id')->references('id')->on('rams')->onDelete('cascade');
            $table->integer('score');
            $table->integer('score_min')->nullable();
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
        Schema::dropIfExists('results');
    }
}
