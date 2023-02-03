<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('s1')->nullable();
            $table->string('s2')->nullable();
            $table->string('s3')->nullable();
            $table->string('s4')->nullable();
            $table->string('s5')->nullable();
            $table->string('s6')->nullable();
            $table->string('s7')->nullable();
            $table->string('s8')->nullable();
            $table->string('s9')->nullable();
            $table->string('s10')->nullable();
            $table->string('s11')->nullable();
            $table->string('s12')->nullable();
            $table->string('s13')->nullable();
            $table->string('s14')->nullable();
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
        Schema::dropIfExists('people');
    }
}
