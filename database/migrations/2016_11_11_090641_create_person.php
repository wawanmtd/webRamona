<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('Person_ID');
            $table->string('NamePerson');
            $table->string('Nickname');
            $table->string('Address');
            $table->string('City');
            $table->integer('Country_ID');
            $table->foreign('Country_ID')->references('Country_ID')->on('countries');
            $table->integer('BlobType_ID');
            $table->foreign('BlobType_ID')->references('BlobType_ID')->on('blob_types');
            $table->string('Picture');
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
        Schema::dropIfExists('persons');
    }
}
