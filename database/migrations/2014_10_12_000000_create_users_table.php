<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('user_surname')->nullable();
            $table->string('user_sex')->nullable();
            $table->string('user_image')->nullable();
            $table->date('user_datenais')->nullable();
            $table->string('user_document')->nullable();
            $table->string('user_description')->nullable();
            $table->string('user_adress')->nullable();
            $table->string('user_code_postal')->nullable();
            $table->string('user_city')->nullable();
            $table->string('user_country')->nullable();
            $table->integer('user_phone')->nullable();
            $table->string('email')->unique();
            $table->string('fb_id')->nullable();
            $table->string('google_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
