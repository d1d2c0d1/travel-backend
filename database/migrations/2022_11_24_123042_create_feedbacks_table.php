<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->boolean('is_resolved')->index()->default(0);
            $table->unsignedBigInteger('phone')->index();
            $table->string('email');
            $table->string('ip')->nullable();
            $table->text('user_agent')->nullable();
            $table->text('question')->default('');

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
        Schema::dropIfExists('feedbacks');
    }
}
