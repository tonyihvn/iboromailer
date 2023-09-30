<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentmails', function (Blueprint $table) {
            $table->id();
            $table->text('recipients');
            $table->string('group')->nullable();
            $table->string('category')->nullable();
            $table->string('title',150);
            $table->string('top_image',150)->nullable();
            $table->text('mail_body')->nullable();
            $table->string('bottom_image',150)->nullable();
            $table->string('link',150)->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('sentmails');
    }
}
