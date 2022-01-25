<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateItemTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_tags', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('title', 128);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            // Indexes
            $table->unique('title');
        });

        // Ref
        DB::statement("ALTER TABLE `item_tags` ADD CONSTRAINT `item_tags_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE `item_tags` DROP FOREIGN KEY `item_tags_fk1`;");
        Schema::dropIfExists('item_tags');
    }
}
