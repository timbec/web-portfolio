<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equations', function (Blueprint $table) {
           //Need: quote, thumbnail (for both slider and cover image), main image, text body, file download.
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('photo_id')->unsigned()->index();
            $table->integer('thumbnail_id')->unsigned()->index();
            $table->string('title');
            $table->string('slug');
            $table->text('excerpt');
            $table->text('body');
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
        Schema::dropIfExists('equations');
    }
}
