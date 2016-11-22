<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationYangbelum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stations', function (Blueprint $table) {
            $table->foreign('DocumentType_ID')->references('DocumentType_ID')->on('document_types');
            $table->foreign('MarkerType_ID')->references('MarkerType_ID')->on('marker_types');
            $table->binary('StationMarker')->nullable();
            $table->binary('StationDocument')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stations', function (Blueprint $table) {
            //
        });
    }
}
