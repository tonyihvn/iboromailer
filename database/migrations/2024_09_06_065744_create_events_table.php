<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',200);
            $table->string('subtitle',200)->nullable();
            $table->text('details')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->text('venue')->nullable();

            $table->text('slide1')->nullable();
            $table->text('slide2')->nullable();
            $table->text('slide3')->nullable();

            $table->text('flyer1')->nullable();
            $table->text('flyer2')->nullable();
            $table->text('flyer3')->nullable();

            $table->string('bgcolor',50)->nullable();
            $table->text('more_info',300)->nullable();
            $table->string('url',300)->nullable();
            $table->string('linkText',50)->nullable();
            $table->text('map_location')->nullable();
            $table->text('postevent_detail')->nullable();
            $table->string('status',30)->nullable();

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
        Schema::dropIfExists('events');
    }
}
