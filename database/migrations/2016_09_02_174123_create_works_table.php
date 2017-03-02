<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('user_id')->unsigned()->index();
           $table->integer('work_category_id')->unsigned()->index();
           $table->integer('thumbnail_id')->unsigned()->index();
           $table->string('title');
           $table->text('body');
           $table->text('description'); 
           $table->string('website_link');
           $table->string('slug')->nullable();
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
        Schema::dropIfExists('works');
    }
}
