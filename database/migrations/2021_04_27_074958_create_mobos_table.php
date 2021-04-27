<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('chipset_id')->unsigned();
            $table->float('price',12,2);
            $table->foreignId('manufacturer_id')->constrained()->onDelete('cascade');
            $table->foreign('chipset_id')->references('id')->on('chipsets')->onDelete('cascade');
            $table->string('socket',15);
            $table->integer('max_memory');
            $table->integer('memory_slots');
            $table->integer('pci_e_x16_slots');
            $table->integer('pci_e_x8_slots');
            $table->integer('pci_e_x4_slots');
            $table->integer('pci_e_x1_slots');
            $table->string('memory_type',6);
            $table->integer('m_2_slots');
            $table->integer('sata_ports');
            $table->integer('usb_2_0_headers');
            $table->integer('usb_3_2_gen1_headers');
            $table->integer('usb_3_2_gen2_headers');
            $table->string('form_factor');
            $table->boolean('wireless_support');
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
        Schema::dropIfExists('mobos');
    }
}
