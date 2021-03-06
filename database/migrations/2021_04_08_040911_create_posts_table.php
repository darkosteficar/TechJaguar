<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('post_image');
            $table->string('post_title');
            $table->text('body');
            $table->integer('views');
            $table->integer('category_id')->constrained()->onDelete('cascade');
            $table->integer('manufacturer_id')->constrained()->onDelete('cascade');
            $table->integer('gpu_id')->default('0');
            $table->integer('cpu_id')->default('0');
            $table->integer('mobo_id')->default('0');
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
        Schema::dropIfExists('posts');
    }
}
