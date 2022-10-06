<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionSubpositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_subpositions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('position_id')->index();
            $table->string('title');
            $table->string('code');
            $table->integer('price');

            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        DB::statement("ALTER TABLE `promotion_subpositions` ADD CONSTRAINT `promotion_subpositions_fk1` FOREIGN KEY (`position_id`) REFERENCES `promotion_positions`(`id`);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotion_subpositions');
    }
}
