<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailablitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availablities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('availablity_date');
            $table->time('availablity_time');
            $table->foreignId('vehicle_id')->constrained('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('availablities');
    }
}
