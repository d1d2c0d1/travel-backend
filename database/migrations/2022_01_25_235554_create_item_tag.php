<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('item_id');
            $table->unsignedInteger('tag_id');
            $table->unsignedBigInteger('user_id');

            $table->index('item_id');
            $table->index('tag_id');
            $table->index(['item_id', 'tag_id']);
        });

        DB::statement("ALTER TABLE `item_tag` ADD CONSTRAINT `item_tag_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `item_tag` ADD CONSTRAINT `item_tag_fk2` FOREIGN KEY (`item_id`) REFERENCES `items`(`id`);");
        DB::statement("ALTER TABLE `item_tag` ADD CONSTRAINT `item_tag_fk3` FOREIGN KEY (`tag_id`) REFERENCES `card_tags`(`id`);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_tag');
    }
}
