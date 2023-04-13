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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('matric_no',50)->nullable();
            $table->string('phone_number',22)->nullable();


            $table->string('category',30)->nullable();
            $table->string('gender',30)->nullable();
            $table->string('address')->nullable();
            $table->date('dob')->nullable();

            $table->string('role')->nullable();
            $table->string('status')->nullable();

            $table->unsignedBigInteger('school_id')->index()->nullable();
            // $table->foreign('school_id')->references('id')->on('school');

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
