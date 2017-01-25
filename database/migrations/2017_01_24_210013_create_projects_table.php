<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('project_category_id')->unsigned()->index();
            //$table->integer('photo_id')->unsigned()->index();
           // $table->integer('skills_id')->unsigned()->index(); 
            $table->integer('thumbnail_id')->unsigned()->index();
            $table->string('title');
            $table->string('body');
            //$table->string('website_link');
            //$table->string('slug')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
