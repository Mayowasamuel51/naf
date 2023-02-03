<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuretyinfomationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suretyinfomations', function (Blueprint $table) {
            $table->id();
          
            $table->unsignedBigInteger('martic_number');

            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('middlename')->nullable();

            $table->string('fringer')->nullable();

            $table->string('affix_left')->nullable();
            $table->string('affix_front')->nullable();
            $table->string('affix_right')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_birth')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('langugaes')->nullable();
            $table->string('residental_address')->nullable();
            $table->string('international_passport')->nullable();
            $table->string('office_shop')->nullable();
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
        Schema::dropIfExists('suretyinfomations');
    }
}
