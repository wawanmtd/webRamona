<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateDeviceLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_lists', function (Blueprint $table) {
            $table->increments('DeviceList_ID');
            $table->integer('Device_ID');
            $table->foreign('Device_ID')->references('Device_ID')->on('devices');
            $table->string('SerialNumber');
            $table->timestampTz('ManufacureDate');
            $table->timestampTz('PurchaseDate');
            $table->integer('Supplier_ID');
            $table->integer('DeviceStatus_ID');
            $table->integer('Sales_ID');
            $table->integer('Support_ID');
            $table->integer('Pic_ID');
            $table->string('Remark');
            $table->integer('Member_ID');
            $table->integer('PictureType_ID');
            $table->string('Picture');
            $table->integer('DocumentType_ID');
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
        Schema::dropIfExists('device_lists');
    }
}
