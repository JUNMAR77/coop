<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('syspk_member');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->integer('age');
            //$table->integer('gender');
            $table->string('civil_status');
            $table->string('present_address');
            $table->string('landline_no');
            $table->string('mobile_no');
            $table->string('status');
            $table->string('category');
            $table->string('member_type_id');
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
