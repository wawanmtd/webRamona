<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('Vendor_ID');
            $table->string('VencorName');
            $table->string('Address_1');
            $table->string('Address_2');
            $table->integer('VendorType_ID');
            $table->integer('Member_ID');
            $table->foreign('Member_ID')->references('Member_ID')->on('members');
            $table->string('City');
            $table->integer('Country_ID');
            $table->foreign('Country_ID')->references('Country_ID')->on('countries');
            $table->string('Telephone');
            $table->string('Fax');
            $table->string('Email');
            $table->string('PostalCode');
            $table->string('Url');
            $table->string('Remark');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
