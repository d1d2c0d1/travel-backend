<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldIsActiveToItemTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_types', function (Blueprint $table) {
            $table->unsignedTinyInteger('is_active')->after('code')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_types', function (Blueprint $table) {
            $table->dropIndex('item_types_is_active_index');
            $table->dropColumn('is_active');
        });
    }
}
