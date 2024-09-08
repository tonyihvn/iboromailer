<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->unsigned()->nullable();
            $table->string('first_name',50)->nullable();
            $table->string('other_names',50)->nullable();
            $table->string('phone_number',50)->nullable();
            $table->string('email',50)->nullable();
            $table->string('payment',100)->nullable();
            $table->string('approval',30)->nullable();
            $table->string('your_conference_interest',400)->nullable();
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
