<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuretyimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suretyimages', function (Blueprint $table) {
            $table->id();
            $table->integer('martic_number')->nullable();
            $table->string('Affix_left')->nullable();
            $table->string('Affix_front')->nullable();
            $table->string('Affix_right')->nullable();
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
        Schema::dropIfExists('suretyimages');
    }
}
