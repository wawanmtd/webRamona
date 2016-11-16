<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('Member_ID');
            $table->string('Username');
            $table->string('AccessCode');
            $table->integer('Person_ID');
            $table->integer('MemberRole_ID');
            $table->foreign('MemberRole_ID')->references('MemberRole_ID')->on('member_roles');
            $table->string('Remark');
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
        Schema::dropIfExists('members');
    }
}
