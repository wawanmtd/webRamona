<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantityValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantity_values', function (Blueprint $table) {
            $table->increments('QuantityValue_ID');
            $table->integer('QuantityCode_ID');
            $table->foreign('QuantityCode_ID')->references('QuantityCode_ID')->on('quantity_codes');
            $table->double('ValueRangeNumrange');
            $table->string('Description');
            $table->integer('Member_ID');
            $table->foreign('Member_ID')->references('Member_ID')->on('members');
            //$table->string('QValue');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantity_values');
    }
}
