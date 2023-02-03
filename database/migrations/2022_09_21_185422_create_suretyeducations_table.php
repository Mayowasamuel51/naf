<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuretyeducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suretyeducations', function (Blueprint $table) {
            $table->id();
            $table->integer('martic_number')->nullable();
            $table->string('tertiary_i')->nullable();
            $table->string('tertiary_y')->nullable();
            $table->string('tertiary_yg')->nullable();
            $table->string('secondary')->nullable();
            $table->string('s_year_of_entry')->nullable();
            $table->string('s_year_of_gradution')->nullable();
            $table->string('p_year')->nullable();
            $table->string('p_year_g')->nullable();
            $table->string('primary')->nullable();
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
        Schema::dropIfExists('suretyeducations');
    }
}
