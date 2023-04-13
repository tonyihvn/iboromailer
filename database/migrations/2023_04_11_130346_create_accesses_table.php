<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesses', function (Blueprint $table) {
            $table->id();
            $table->date('checkout_date')->nullable();
            $table->date('expected_checkin')->nullable();
            $table->date('actual_checkin')->nullable();

            $table->string('penalty',50)->nullable();
            $table->double('quantity_checkout',10,2)->nullable();

            $table->unsignedBigInteger('book_id')->index()->nullable();
            $table->foreign('book_id')->references('id')->on('books');

            $table->unsignedBigInteger('student_id')->index()->nullable();
            $table->foreign('student_id')->references('id')->on('users');

            $table->string('status',50)->nullable();

            $table->unsignedBigInteger('school_id')->index()->nullable();
            $table->foreign('school_id')->references('id')->on('schools');

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
        Schema::dropIfExists('accesses');
    }
}
