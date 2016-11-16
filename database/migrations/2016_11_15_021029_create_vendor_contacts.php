<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_contacts', function (Blueprint $table) {
            $table->increments('VendorContact_ID');
            $table->integer('Vendor_ID');
            $table->foreign('Vendor_ID')->references('Vendor_ID')->on('vendors');
            $table->integer('Person_ID');
            $table->foreign('Person_ID')->references('Person_ID')->on('persons');
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
        Schema::dropIfExists('vendor_contacts');
    }
}
