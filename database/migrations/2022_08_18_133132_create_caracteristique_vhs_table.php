<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristiqueVhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristique_vhs', function (Blueprint $table) {
            $table->id();
             $table->string('caracteristique_principale');
             $table->boolean('ESP')->nullable();
            $table->boolean('Radio')->nullable();
            $table->boolean('AirBag')->nullable();
            $table->boolean('ABS')->nullable();
             $table->boolean('Direction_assiste')->nullable();
            $table->boolean('sieg_enfant')->nullable();
            $table->boolean('GPS')->nullable();
            $table->boolean('coffre_de_toi')->nullable();
            $table->boolean('pneu_neige')->nullable();
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade');
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
        Schema::dropIfExists('caracteristique_vhs');
    }
}
