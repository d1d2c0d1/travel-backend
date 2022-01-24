<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostsAddBestAndIsMain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('is_main')->default(0)->after('id');
            $table->boolean('is_week')->default(0)->after('is_week');
            $table->longText('tags')->after('image')->change();
            $table->mediumText('seo_description')->default('')->after('category_id')->change();
            $table->dateTime('published_at')->after('category_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->removeColumn('is_main');
            $table->removeColumn('is_week');
        });
    }
}
