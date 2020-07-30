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

            $table->string('name')->nullable();
            $table->string('family')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('date_of_birth')->nullable();
            $table->boolean('sex')->default(0);

            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('avatar')->nullable();

            $table->timestamp('email_verified_at')->nullable();

            $table->boolean('has_two_factor')->default(false);

            $table->string('password')->nullable();
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
