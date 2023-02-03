<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectMothersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspect_mothers', function (Blueprint $table) {
            $table->id();
         
            $table->string('mother_name')->nullable();
            // $table->string('mother_address')->nullable();
            $table->string('mother_birth')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('mother_res_address')->nullable();
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
        Schema::dropIfExists('suspect_mothers');
    }
}
