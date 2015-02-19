<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page__pages', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_home');
            $table->string('template');
            $table->timestamps();
        });

        Schema::create('page__page_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->string('slug');
            $table->boolean('status');
            $table->text('body');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('og_title');
            $table->string('og_description');
            $table->string('og_image');
            $table->string('og_type');

            $table->unique(['page_id', 'locale']);
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
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
        Schema::drop('page__page_translations');
        Schema::drop('page__pages');
    }
}
