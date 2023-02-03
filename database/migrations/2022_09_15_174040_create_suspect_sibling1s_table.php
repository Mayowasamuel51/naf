<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectSibling1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspect_sibling1s', function (Blueprint $table) {
            $table->id();

            $table->string('Sibling1_name')->nullable();
        
            $table->string('Sibling1_birth')->nullable();
            $table->string('Sibling1_phone')->nullable();
            $table->string('Sibling1_res_address')->nullable();

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
        Schema::dropIfExists('suspect_sibling1s');
    }
}
