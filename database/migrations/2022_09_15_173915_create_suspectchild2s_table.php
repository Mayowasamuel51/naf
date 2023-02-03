<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectchild2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspectchild2s', function (Blueprint $table) {
            $table->id();
           
            $table->string('child2_name')->nullable();
            $table->string('child2_address')->nullable();
            $table->string('child2_birth')->nullable();
            $table->string('child2_phone')->nullable();
            $table->string('child2_res_address')->nullable();

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
        Schema::dropIfExists('suspectchild2s');
    }
}
