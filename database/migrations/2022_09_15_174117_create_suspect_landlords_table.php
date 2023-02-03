<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectLandlordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspect_landlords', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('suspectinfomations');
            $table->string('Landlord_name')->nullable();
            $table->string('Landlord_address')->nullable();
          
            $table->string('Landlord_phone')->nullable();
          
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
        Schema::dropIfExists('suspect_landlords');
    }
}
