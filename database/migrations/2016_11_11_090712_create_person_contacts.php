<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_contacts', function (Blueprint $table) {
            $table->increments('PersonContact_ID');
            $table->integer('Person_ID');
            $table->foreign('Person_ID')->references('Person_ID')->on('persons');
            $table->integer('ContactType_ID');
            $table->foreign('ContactType_ID')->references('ContactType_ID')->on('contact_types');
            $table->string('ContactValue');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_contacts');
    }
}
