<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_mileage');
            $table->string('vehicle_country_registration')->nullable();
            $table->date('vehicle_date_release')->nullable();
            $table->date('vehicle_date_next_control')->nullable();
            $table->string('vehicle_registration');
            $table->string('vehicle_adress');
            $table->string('vehicle_price_location');
            $table->string('vehicle_description')->nullable();
            $table->string('vehicle_value')->nullable();
            $table->string('vehicle_dispo')->nullable();
            $table->string('vehicle_number_insurance')->nullable();
            $table->enum('status',['disponible','indisponible'])->default('disponible');
            $table->date('vehicle_date_start_insurance')->nullable();
            $table->date('vehicle_date_end_insurance')->nullable();
            $table->foreignId('prop_id')->constrained('users');
           $table->foreignId('nbdoor_id')->constrained('door_numbers');
            $table->foreignId('insurance_id')->nullable()->constrained('insurances');
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
        Schema::dropIfExists('vehicles');
    }
}
