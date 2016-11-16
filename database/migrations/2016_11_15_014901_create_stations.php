<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->increments('Station_ID');
            $table->integer('StationType_ID');
            $table->foreign('StationType_ID')->references('StationType_ID')->on('station_types');
            $table->string('Location');
            $table->string('StationName');
            $table->string('Description');
            $table->string('Address');
            $table->string('City');
            $table->integer('Country_ID');
            $table->foreign('Country_ID')->references('Country_ID')->on('countries');
            $table->string('PowerSource');
            $table->integer('Pic_ID');
            $table->date('InstallationDate');
            $table->integer('Member_ID');
            $table->foreign('Member_ID')->references('Member_ID')->on('members');
            $table->integer('MarkerType_ID');
            $table->integer('DocumentType_ID');
            $table->string('Marker');
            $table->string('Document');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
