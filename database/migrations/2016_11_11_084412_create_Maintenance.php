<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->increments('Maintenance_ID');
            $table->bigInteger('MaintenanceObject_ID');
            $table->integer('MaintenanceObjectType');
            $table->integer('MaintenanceType_ID');
            $table->foreign('MaintenanceType_ID')->references('MaintenanceType_ID')->on('maintenance_types');
            $table->timestampTz('ScheduledFrom');
            $table->timestampTz('Scheduledto');
            $table->timestampTz('ActualFrom');
            $table->timestampTz('ActualTo');
            $table->string('Remark');
            $table->integer('VendorContact_ID');
            $table->integer('Member_ID');
            $table->text('Note');
            $table->integer('Pic_ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenances');
    }
}
