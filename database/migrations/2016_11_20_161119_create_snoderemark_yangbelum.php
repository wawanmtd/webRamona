<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSnoderemarkYangbelum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sensor_node_remarks', function (Blueprint $table) {
            $table->foreign('DocumentType_ID')->references('DocumentType_ID')->on('document_types');
            $table->binary('SensorNodeRemarkDocument')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sensor_node_remarks', function (Blueprint $table) {
            //
        });
    }
}
