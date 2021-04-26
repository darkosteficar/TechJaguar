<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->float('price',12,2);
            $table->foreignId('manufacturer_id')->constrained()->onDelete('cascade');
            $table->integer('length');
            $table->integer('height');
            $table->integer('width');
            $table->string('type');
            $table->integer('num_2_5_bays');
            $table->integer('num_3_5_bays');
            $table->integer('max_gpu_length');
            $table->integer('expansion_slots');
            $table->integer('front_panel_usb');
            $table->string('motherboard_form_factor');
            $table->boolean('side_panel_glass');
            $table->boolean('power_supply_shroud');
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
        Schema::dropIfExists('pc_cases');
    }
}
