<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProlongationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prolongations', function (Blueprint $table) {
            $table->id();
            $table->date('prolongation_date_start');
            $table->date('prolongation_date_end');
            $table->foreignId('renting_id')->constrained('rentings');
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
        Schema::dropIfExists('prolongations');
    }
}
