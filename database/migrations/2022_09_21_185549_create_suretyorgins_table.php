<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuretyorginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suretyorgins', function (Blueprint $table) {
            $table->id();
            $table->integer('martic_number')->nullable();
            $table->string('nationality')->nullable();
            
            $table->string('state')->nullable();
            $table->string('ethnic_group')->nullable();
            $table->string('local_govt')->nullable();
            $table->string('town_village')->nullable();
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
        Schema::dropIfExists('suretyorgins');
    }
}
