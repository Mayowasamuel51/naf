<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuretyherebiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suretyherebies', function (Blueprint $table) {
            $table->id();
            $table->integer('martic_number')->nullable();
            // $table->foreignId('user_id')->constrained('suspectinfomations');
            $table->string('hereby_name')->nullable();
            $table->string('hereby_signature')->nullable();
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
        Schema::dropIfExists('suretyherebies');
    }
}
