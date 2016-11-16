<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->increments('ActivityLog_ID');
            $table->timestampTz('ActivityTime');
            $table->integer('ActivityType_ID');
            $table->foreign('ActivityType_ID')->references('ActivityType_ID')->on('activity_types');
            $table->integer('Member_ID');
            $table->string('ActivityInfo');
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
        Schema::dropIfExists('activity_logs');
    }
}
