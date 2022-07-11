<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuideOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guide_orders', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('created_user_id');
            $table->unsignedBigInteger('accepted_user_id')->nullable();
            $table->unsignedBigInteger('edit_user_id')->nullable();
            $table->unsignedInteger('city_id');
            $table->unsignedTinyInteger('work_experience');
            $table->text('excursions');
            $table->text('about');
            $table->text('comment');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guide_orders');
    }
}
