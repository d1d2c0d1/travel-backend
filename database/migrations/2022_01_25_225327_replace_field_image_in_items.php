<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReplaceFieldImageInItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->text('images')->default('[]')->after('description');
            $table->dropColumn('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('image', 255)->nullable();
            $table->dropColumn('images');
        });
    }
}
