<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title',100)->unique();
            $table->string('subtitle',100)->nullable();
            $table->string('author',50)->nullable();
            $table->string('isbn_no',50)->nullable();
            $table->text('description')->nullable();
            $table->string('location',80)->nullable();
            $table->string('image',50)->nullable();
            $table->string('category',50)->nullable();
            $table->string('publisher',100)->nullable();
            $table->string('copyright_year',10)->nullable();
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
        Schema::dropIfExists('books');
    }
}
