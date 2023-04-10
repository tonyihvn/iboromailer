<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->index();
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title',150)->nullable();
            $table->string('location',150)->nullable();
            $table->date('start_date')->nullable();
            $table->string('estimated_duration',30)->nullable();
            $table->string('duration',30)->nullable();

            $table->text('details')->nullable();
            $table->unsignedBigInteger('project_manager')->index();
            $table->foreign('project_manager')->references('id')->on('users')->onDelete('cascade');
            $table->string('status',30)->nullable();
            $table->unsignedBigInteger('business_id')->index()->nullable();
            $table->foreign('business_id')->references('id')->on('businesses');
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
        Schema::dropIfExists('projects');
    }
}
