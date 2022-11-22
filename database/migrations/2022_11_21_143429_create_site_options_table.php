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
            $table->string('code', 255)->nullable(false);
            $table->string('name', 255)->nullable(false);
            $table->text('value')->nullable(false);
            $table->string('type', 64)->nullable(false);
            $table->string('validate', 1024)->nullable(false);
            $table->foreignId('user_created_at')
                ->constrained('users')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->foreignId('user_updated_at')->constrained('users')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
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
