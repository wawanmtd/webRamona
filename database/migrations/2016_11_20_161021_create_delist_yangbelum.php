<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDelistYangbelum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device_lists', function (Blueprint $table) {
            $table->foreign('DocumentType_ID')->references('DocumentType_ID')->on('document_types');
            $table->foreign('PictureType_ID')->references('PictureType_ID')->on('picture_types');
            $table->binary('DeviceListPicture')->nullable();
            $table->binary('DeviceListDocument')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('device_lists', function (Blueprint $table) {
            //
        });
    }
}
