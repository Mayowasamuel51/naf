<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuretyextrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suretyextras', function (Blueprint $table) {
            $table->id();
            $table->integer('martic_number')->nullable();
            $table->longText('relationship')->nullable();
            $table->longText('crime')->nullable();
            $table->longText('penalty')->nullable();
            $table->longText('time_known')->nullable();
            $table->longText('surety_requirement')->nullable();
            $table->longText('prior_case')->nullable();
            $table->longText('prior_surety')->nullable();
            $table->longText('suspect_name')->nullable();
            $table->longText('date_signature')->nullable();
          
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
        Schema::dropIfExists('suretyextras');
    }
}
