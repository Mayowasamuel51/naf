<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectSpousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspect_spouses', function (Blueprint $table) {
            $table->id();
         
            $table->string('spouse_name')->nullable();
            $table->string('spouse_maiden')->nullable();
            $table->string('spouse_date_brith')->nullable();
            $table->string('spouse_residential_address')->nullable();
            $table->string('spouse_phone')->nullable();
            $table->string('spouse_work')->nullable();
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
        Schema::dropIfExists('suspect_spouses');
    }
}
