<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilestoneReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milestone_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('milestone_id')->index();
            $table->foreign('milestone_id')->references('id')->on('project_milestones')->onDelete('cascade');

            $table->unsignedBigInteger('task_id')->index();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');

            $table->string('subject',150)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date',30)->nullable();
            $table->text('details')->nullable();
            $table->unsignedBigInteger('recorded_by')->index();
            $table->foreign('recorded_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('category',30)->nullable();
            $table->string('approval',30)->nullable();
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
        Schema::dropIfExists('milestone_reports');
    }
}
