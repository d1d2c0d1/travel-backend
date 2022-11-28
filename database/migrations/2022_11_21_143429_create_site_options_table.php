<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_options', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255);
            $table->string('name', 255);
            $table->text('value')->nullable();
            $table->string('type', 64);
            $table->string('validate', 1024);
            $table->unsignedBigInteger('user_id_created_at');
            $table->unsignedBigInteger('user_id_updated_at')->nullable();
            $table->foreign('user_id_created_at')
                ->references('id')->on('users')
                ->cascadeOnUpdate();
            $table->foreign('user_id_updated_at')
                ->references('id')->on('users')
                ->cascadeOnUpdate();
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
        Schema::dropIfExists('site_options');
    }
}
