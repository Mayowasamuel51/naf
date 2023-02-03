<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectSibling2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspect_sibling2s', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('suspectinfomations');
            $table->string('Sibling2_name')->nullable();
           
            $table->string('Sibling2_birth')->nullable();
            $table->string('Sibling2_phone')->nullable();
            $table->string('Sibling2_res_address')->nullable();

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
        Schema::dropIfExists('suspect_sibling2s');
    }
}
