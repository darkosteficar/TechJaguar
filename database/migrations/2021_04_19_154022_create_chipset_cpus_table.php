<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChipsetCpusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chipset_cpus', function (Blueprint $table) {
            $table->integer('cpu_id')->unsigned();
            $table->integer('chipset_id')->unsigned();
            $table->foreign('cpu_id')->references('id')->on('cpus')->onDelete('cascade');
            $table->foreign('chipset_id')->references('id')->on('chipsets')->onDelete('cascade');
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
        Schema::dropIfExists('chipset_cpus');
    }
}
