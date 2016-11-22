<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('News_ID');
            $table->integer('NewsType_ID');
            $table->foreign('NewsType_ID')->references('NewsType_ID')->on('news_types');
            $table->integer('Member_ID');
            $table->foreign('Member_ID')->references('Member_ID')->on('members');
            $table->boolean('IsUrgent');
            $table->string('NewsTitle');
            $table->string('NewsContent');
            $table->integer('PictureType_ID')->nullable();
            $table->foreign('PictureType_ID')->references('PictureType_ID')->on('picture_types');
            $table->binary('NewsPicture')->nullable();
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
        Schema::dropIfExists('news');
    }
}
