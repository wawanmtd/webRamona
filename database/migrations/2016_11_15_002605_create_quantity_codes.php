<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantityCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantity_codes', function (Blueprint $table) {
            $table->increments('QuantityCode_ID');
            $table->integer('Quantity_ID');
            $table->foreign('Quantity_ID')->references('Quantity_ID')->on('quantities');
            $table->integer('QuantityCode');
            $table->string('Remark');
            $table->integer('Member_ID');
            $table->foreign('Member_ID')->references('Member_ID')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantity_codes');
    }
}
