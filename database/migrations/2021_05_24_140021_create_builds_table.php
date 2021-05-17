<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('builds', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->constrained()->onDelete('cascade');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreignID('psu_id')->constrained()->onDelete('cascade');
            $table->integer('psu_id')->unsigned()->nullable();
            $table->foreignID('cpu_id')->constrained()->onDelete('cascade');
            $table->integer('cpu_id')->unsigned()->nullable();
            $table->foreignID('mobo_id')->constrained()->onDelete('cascade');
            $table->integer('mobo_id')->unsigned()->nullable();
            $table->foreignID('cooler_id')->constrained()->onDelete('cascade');
            $table->integer('cooler_id')->unsigned()->nullable();
            $table->foreignID('pc_case_id')->constrained()->onDelete('cascade');
            $table->integer('pc_case_id')->unsigned()->nullable();
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
        Schema::dropIfExists('builds');
    }
}
