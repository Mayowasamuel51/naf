<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectempolymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspectempolyments', function (Blueprint $table) {
            $table->id();
            $table->string('last_place')->nullable();
         
            $table->string('address_employer')->nullable();
            $table->string('Penultimate_Place')->nullable();
            $table->string('address_of_penultimate')->nullable();
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
        Schema::dropIfExists('suspectempolyments');
    }
}
