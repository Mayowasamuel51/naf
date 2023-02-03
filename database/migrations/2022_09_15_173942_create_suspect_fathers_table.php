<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectFathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspect_fathers', function (Blueprint $table) {
            $table->id();
           
            $table->string('father_name')->nullable();
            // $table->string('father_address')->nullable();
            $table->string('father_birth')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('father_res_address')->nullable();

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
        Schema::dropIfExists('suspect_fathers');
    }
}
