<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->index();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('milestone_id')->index()->nullable();
            $table->foreign('milestone_id')->references('id')->on('project_milestones')->onDelete('cascade');
            $table->string('subject',150)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date',30)->nullable();
            $table->text('details')->nullable();
            $table->unsignedBigInteger('assigned_to')->index();
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
            $table->string('category',30)->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
