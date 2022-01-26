<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateItemCardCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_category', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('item_id');
            $table->unsignedInteger('category_id');
            $table->unsignedBigInteger('user_id');

            $table->index('item_id');
            $table->index('category_id');
            $table->index(['item_id', 'category_id']);
        });

        DB::statement("ALTER TABLE `item_category` ADD CONSTRAINT `item_category_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `item_category` ADD CONSTRAINT `item_category_fk1` FOREIGN KEY (`item_id`) REFERENCES `items`(`id`);");
        DB::statement("ALTER TABLE `item_category` ADD CONSTRAINT `item_category_fk2` FOREIGN KEY (`category_id`) REFERENCES `card_categories`(`id`);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_card_category');
    }
}
