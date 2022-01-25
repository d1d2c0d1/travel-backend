<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {

            $table->unsignedBigInteger('owner_user_id')->nullable()->default(null)->change();
            $table->unsignedBigInteger('edit_user_id')->nullable()->default(null)->change();
            $table->unsignedBigInteger('accepted_user_id')->nullable()->default(null)->change();

            $table->unsignedInteger('company_id')->nullable()->default(null)->change();
            $table->unsignedInteger('country_id')->nullable()->default(null)->change();
            $table->unsignedInteger('region_id')->nullable()->default(null)->change();
            $table->unsignedInteger('city_id')->nullable()->default(null)->change();
            $table->unsignedBigInteger('area_id')->nullable()->default(null)->change();
            $table->unsignedInteger('type_id')->nullable()->default(null)->change();

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
