<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixItemTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->removeColumn('category_id');
            $table->removeColumn('price_type_id');
            $table->dropIndex('items_category_id_index');
            $table->dropIndex('items_price_type_id_index');
            $table->dropColumn('category_id');
            $table->dropColumn('price_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
