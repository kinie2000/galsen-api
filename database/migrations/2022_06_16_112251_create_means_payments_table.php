<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

class CreateMeansPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('means_payments', function (Blueprint $table) {
             $table->id();
             $table->integer('compte_secret_code')->unique();
             $table->integer('compte_number')->unique();
             $table->string('compte_libelle');
             $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('means_payments');
    }
}
