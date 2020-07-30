<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->string('field');
            $table->string('degree');
            $table->integer('number_of_child');
            $table->boolean('marriage');

            // relation to user
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->softDeletes();

            $table->timestamps();
        });


        Schema::create('doctor_section', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('doctor_id')->unsigned()->index();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');

            $table->bigInteger('section_id')->unsigned()->index();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
        Schema::dropIfExists('doctor_section');
    }
}
