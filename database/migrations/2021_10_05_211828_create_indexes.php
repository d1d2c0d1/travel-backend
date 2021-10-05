<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /**
         *
         * MT-1022
         * Create all foreign and another indexes
         *
         */
        DB::statement("ALTER TABLE `countries` ADD CONSTRAINT `countries_fk0` FOREIGN KEY (`language_id`) REFERENCES `languages`(`id`);");
        DB::statement("ALTER TABLE `regions` ADD CONSTRAINT `regions_fk0` FOREIGN KEY (`country_id`) REFERENCES `countries`(`id`);");
        DB::statement("ALTER TABLE `cities` ADD CONSTRAINT `cities_fk0` FOREIGN KEY (`country_id`) REFERENCES `countries`(`id`);");
        DB::statement("ALTER TABLE `cities` ADD CONSTRAINT `cities_fk1` FOREIGN KEY (`region_id`) REFERENCES `regions`(`id`);");
        DB::statement("ALTER TABLE `areas` ADD CONSTRAINT `areas_fk0` FOREIGN KEY (`country_id`) REFERENCES `countries`(`id`);");
        DB::statement("ALTER TABLE `areas` ADD CONSTRAINT `areas_fk1` FOREIGN KEY (`region_id`) REFERENCES `regions`(`id`);");
        DB::statement("ALTER TABLE `areas` ADD CONSTRAINT `areas_fk2` FOREIGN KEY (`city_id`) REFERENCES `cities`(`id`);");
        DB::statement("ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`);");
        DB::statement("ALTER TABLE `users` ADD CONSTRAINT `users_fk1` FOREIGN KEY (`country_id`) REFERENCES `countries`(`id`);");
        DB::statement("ALTER TABLE `users` ADD CONSTRAINT `users_fk2` FOREIGN KEY (`region_id`) REFERENCES `regions`(`id`);");
        DB::statement("ALTER TABLE `users` ADD CONSTRAINT `users_fk3` FOREIGN KEY (`city_id`) REFERENCES `cities`(`id`);");
        DB::statement("ALTER TABLE `users` ADD CONSTRAINT `users_fk4` FOREIGN KEY (`area_id`) REFERENCES `areas`(`id`);");
        DB::statement("ALTER TABLE `users` ADD CONSTRAINT `users_fk5` FOREIGN KEY (`language_id`) REFERENCES `languages`(`id`);");
        DB::statement("ALTER TABLE `user_history` ADD CONSTRAINT `user_history_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `user_history` ADD CONSTRAINT `user_history_fk1` FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`);");
        DB::statement("ALTER TABLE `user_history` ADD CONSTRAINT `user_history_fk2` FOREIGN KEY (`permission_id`) REFERENCES `permissions`(`id`);");
        DB::statement("ALTER TABLE `role_permission` ADD CONSTRAINT `role_permission_fk0` FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`);");
        DB::statement("ALTER TABLE `role_permission` ADD CONSTRAINT `role_permission_fk1` FOREIGN KEY (`permission_id`) REFERENCES `permissions`(`id`);");
        DB::statement("ALTER TABLE `posts` ADD CONSTRAINT `posts_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `posts` ADD CONSTRAINT `posts_fk1` FOREIGN KEY (`country_id`) REFERENCES `countries`(`id`);");
        DB::statement("ALTER TABLE `posts` ADD CONSTRAINT `posts_fk2` FOREIGN KEY (`region_id`) REFERENCES `regions`(`id`);");
        DB::statement("ALTER TABLE `posts` ADD CONSTRAINT `posts_fk3` FOREIGN KEY (`city_id`) REFERENCES `cities`(`id`);");
        DB::statement("ALTER TABLE `posts` ADD CONSTRAINT `posts_fk4` FOREIGN KEY (`area_id`) REFERENCES `areas`(`id`);");
        DB::statement("ALTER TABLE `posts` ADD CONSTRAINT `posts_fk5` FOREIGN KEY (`language_id`) REFERENCES `languages`(`id`);");
        DB::statement("ALTER TABLE `posts` ADD CONSTRAINT `posts_fk6` FOREIGN KEY (`company_id`) REFERENCES `companies`(`id`);");
        DB::statement("ALTER TABLE `posts` ADD CONSTRAINT `posts_fk7` FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`);");
        DB::statement("ALTER TABLE `items` ADD CONSTRAINT `items_fk0` FOREIGN KEY (`created_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `items` ADD CONSTRAINT `items_fk1` FOREIGN KEY (`owner_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `items` ADD CONSTRAINT `items_fk2` FOREIGN KEY (`edit_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `items` ADD CONSTRAINT `items_fk3` FOREIGN KEY (`accepted_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `items` ADD CONSTRAINT `items_fk4` FOREIGN KEY (`company_id`) REFERENCES `companies`(`id`);");
        DB::statement("ALTER TABLE `items` ADD CONSTRAINT `items_fk5` FOREIGN KEY (`country_id`) REFERENCES `countries`(`id`);");
        DB::statement("ALTER TABLE `items` ADD CONSTRAINT `items_fk6` FOREIGN KEY (`region_id`) REFERENCES `regions`(`id`);");
        DB::statement("ALTER TABLE `items` ADD CONSTRAINT `items_fk7` FOREIGN KEY (`city_id`) REFERENCES `cities`(`id`);");
        DB::statement("ALTER TABLE `items` ADD CONSTRAINT `items_fk8` FOREIGN KEY (`area_id`) REFERENCES `areas`(`id`);");
        DB::statement("ALTER TABLE `items` ADD CONSTRAINT `items_fk9` FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`);");
        DB::statement("ALTER TABLE `items` ADD CONSTRAINT `items_fk10` FOREIGN KEY (`price_type_id`) REFERENCES `price_types`(`id`);");
        DB::statement("ALTER TABLE `items` ADD CONSTRAINT `items_fk11` FOREIGN KEY (`type_id`) REFERENCES `item_types`(`id`);");
        DB::statement("ALTER TABLE `companies` ADD CONSTRAINT `companies_fk0` FOREIGN KEY (`create_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `companies` ADD CONSTRAINT `companies_fk1` FOREIGN KEY (`owner_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `companies` ADD CONSTRAINT `companies_fk2` FOREIGN KEY (`country_id`) REFERENCES `countries`(`id`);");
        DB::statement("ALTER TABLE `companies` ADD CONSTRAINT `companies_fk3` FOREIGN KEY (`region_id`) REFERENCES `regions`(`id`);");
        DB::statement("ALTER TABLE `companies` ADD CONSTRAINT `companies_fk4` FOREIGN KEY (`city_id`) REFERENCES `cities`(`id`);");
        DB::statement("ALTER TABLE `companies` ADD CONSTRAINT `companies_fk5` FOREIGN KEY (`area_id`) REFERENCES `areas`(`id`);");
        DB::statement("ALTER TABLE `companies` ADD CONSTRAINT `companies_fk6` FOREIGN KEY (`language_id`) REFERENCES `languages`(`id`);");
        DB::statement("ALTER TABLE `properties` ADD CONSTRAINT `properties_fk0` FOREIGN KEY (`item_type_id`) REFERENCES `item_types`(`id`);");
        DB::statement("ALTER TABLE `properties` ADD CONSTRAINT `properties_fk1` FOREIGN KEY (`type_id`) REFERENCES `property_types`(`id`);");
        DB::statement("ALTER TABLE `item_property` ADD CONSTRAINT `item_property_fk0` FOREIGN KEY (`created_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `item_property` ADD CONSTRAINT `item_property_fk1` FOREIGN KEY (`edit_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `item_property` ADD CONSTRAINT `item_property_fk2` FOREIGN KEY (`item_id`) REFERENCES `items`(`id`);");
        DB::statement("ALTER TABLE `item_property` ADD CONSTRAINT `item_property_fk3` FOREIGN KEY (`property_id`) REFERENCES `properties`(`id`);");
        DB::statement("ALTER TABLE `reviews` ADD CONSTRAINT `reviews_fk0` FOREIGN KEY (`created_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `reviews` ADD CONSTRAINT `reviews_fk1` FOREIGN KEY (`accepted_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `reviews` ADD CONSTRAINT `reviews_fk2` FOREIGN KEY (`edit_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `reviews` ADD CONSTRAINT `reviews_fk3` FOREIGN KEY (`item_id`) REFERENCES `items`(`id`);");
        DB::statement("ALTER TABLE `reviews` ADD CONSTRAINT `reviews_fk4` FOREIGN KEY (`gallery_id`) REFERENCES `galleries`(`id`);");
        DB::statement("ALTER TABLE `galleries` ADD CONSTRAINT `galleries_fk0` FOREIGN KEY (`created_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `gallery_image` ADD CONSTRAINT `gallery_image_fk0` FOREIGN KEY (`created_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `gallery_image` ADD CONSTRAINT `gallery_image_fk1` FOREIGN KEY (`gallery_id`) REFERENCES `galleries`(`id`);");
        DB::statement("ALTER TABLE `categories` ADD CONSTRAINT `categories_fk0` FOREIGN KEY (`created_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `categories` ADD CONSTRAINT `categories_fk1` FOREIGN KEY (`edit_user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `orders` ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `orders` ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`item_id`) REFERENCES `items`(`id`);");
        DB::statement("ALTER TABLE `favorites` ADD CONSTRAINT `favorites_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `favorites` ADD CONSTRAINT `favorites_fk1` FOREIGN KEY (`item_id`) REFERENCES `items`(`id`);");
        DB::statement("ALTER TABLE `likes` ADD CONSTRAINT `likes_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `likes` ADD CONSTRAINT `likes_fk1` FOREIGN KEY (`item_id`) REFERENCES `items`(`id`);");
        DB::statement("ALTER TABLE `notifications` ADD CONSTRAINT `notifications_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);");
        DB::statement("ALTER TABLE `adverts` ADD CONSTRAINT `adverts_fk0` FOREIGN KEY (`type_id`) REFERENCES `advert_types`(`id`);");
        DB::statement("ALTER TABLE `adverts` ADD CONSTRAINT `adverts_fk1` FOREIGN KEY (`language_id`) REFERENCES `languages`(`id`);");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            DB::statement("ALTER TABLE `countries` DROP FOREIGN KEY `countries_fk0`;");
            DB::statement("ALTER TABLE `regions` DROP FOREIGN KEY `regions_fk0`;");
            DB::statement("ALTER TABLE `cities` DROP FOREIGN KEY `cities_fk0`;");
            DB::statement("ALTER TABLE `cities` DROP FOREIGN KEY `cities_fk1`;");
            DB::statement("ALTER TABLE `areas` DROP FOREIGN KEY `areas_fk0`;");
            DB::statement("ALTER TABLE `areas` DROP FOREIGN KEY `areas_fk1`;");
            DB::statement("ALTER TABLE `areas` DROP FOREIGN KEY `areas_fk2`;");
            DB::statement("ALTER TABLE `users` DROP FOREIGN KEY `users_fk0`;");
            DB::statement("ALTER TABLE `users` DROP FOREIGN KEY `users_fk1`;");
            DB::statement("ALTER TABLE `users` DROP FOREIGN KEY `users_fk2`;");
            DB::statement("ALTER TABLE `users` DROP FOREIGN KEY `users_fk3`;");
            DB::statement("ALTER TABLE `users` DROP FOREIGN KEY `users_fk4`;");
            DB::statement("ALTER TABLE `users` DROP FOREIGN KEY `users_fk5`;");
            DB::statement("ALTER TABLE `user_history` DROP FOREIGN KEY `user_history_fk0`;");
            DB::statement("ALTER TABLE `user_history` DROP FOREIGN KEY `user_history_fk1`;");
            DB::statement("ALTER TABLE `user_history` DROP FOREIGN KEY `user_history_fk2`;");
            DB::statement("ALTER TABLE `role_permission` DROP FOREIGN KEY `role_permission_fk0`;");
            DB::statement("ALTER TABLE `role_permission` DROP FOREIGN KEY `role_permission_fk1`;");
            DB::statement("ALTER TABLE `posts` DROP FOREIGN KEY `posts_fk0`;");
            DB::statement("ALTER TABLE `posts` DROP FOREIGN KEY `posts_fk1`;");
            DB::statement("ALTER TABLE `posts` DROP FOREIGN KEY `posts_fk2`;");
            DB::statement("ALTER TABLE `posts` DROP FOREIGN KEY `posts_fk3`;");
            DB::statement("ALTER TABLE `posts` DROP FOREIGN KEY `posts_fk4`;");
            DB::statement("ALTER TABLE `posts` DROP FOREIGN KEY `posts_fk5`;");
            DB::statement("ALTER TABLE `posts` DROP FOREIGN KEY `posts_fk6`;");
            DB::statement("ALTER TABLE `posts` DROP FOREIGN KEY `posts_fk7`;");
            DB::statement("ALTER TABLE `items` DROP FOREIGN KEY `items_fk0`;");
            DB::statement("ALTER TABLE `items` DROP FOREIGN KEY `items_fk1`;");
            DB::statement("ALTER TABLE `items` DROP FOREIGN KEY `items_fk2`;");
            DB::statement("ALTER TABLE `items` DROP FOREIGN KEY `items_fk3`;");
            DB::statement("ALTER TABLE `items` DROP FOREIGN KEY `items_fk4`;");
            DB::statement("ALTER TABLE `items` DROP FOREIGN KEY `items_fk5`;");
            DB::statement("ALTER TABLE `items` DROP FOREIGN KEY `items_fk6`;");
            DB::statement("ALTER TABLE `items` DROP FOREIGN KEY `items_fk7`;");
            DB::statement("ALTER TABLE `items` DROP FOREIGN KEY `items_fk8`;");
            DB::statement("ALTER TABLE `items` DROP FOREIGN KEY `items_fk9`;");
            DB::statement("ALTER TABLE `items` DROP FOREIGN KEY `items_fk10`;");
            DB::statement("ALTER TABLE `items` DROP FOREIGN KEY `items_fk11`;");
            DB::statement("ALTER TABLE `companies` DROP FOREIGN KEY `companies_fk0`;");
            DB::statement("ALTER TABLE `companies` DROP FOREIGN KEY `companies_fk1`;");
            DB::statement("ALTER TABLE `companies` DROP FOREIGN KEY `companies_fk2`;");
            DB::statement("ALTER TABLE `companies` DROP FOREIGN KEY `companies_fk3`;");
            DB::statement("ALTER TABLE `companies` DROP FOREIGN KEY `companies_fk4`;");
            DB::statement("ALTER TABLE `companies` DROP FOREIGN KEY `companies_fk5`;");
            DB::statement("ALTER TABLE `companies` DROP FOREIGN KEY `companies_fk6`;");
            DB::statement("ALTER TABLE `properties` DROP FOREIGN KEY `properties_fk0`;");
            DB::statement("ALTER TABLE `properties` DROP FOREIGN KEY `properties_fk1`;");
            DB::statement("ALTER TABLE `item_property` DROP FOREIGN KEY `item_property_fk0`;");
            DB::statement("ALTER TABLE `item_property` DROP FOREIGN KEY `item_property_fk1`;");
            DB::statement("ALTER TABLE `item_property` DROP FOREIGN KEY `item_property_fk2`;");
            DB::statement("ALTER TABLE `item_property` DROP FOREIGN KEY `item_property_fk3`;");
            DB::statement("ALTER TABLE `reviews` DROP FOREIGN KEY `reviews_fk0`;");
            DB::statement("ALTER TABLE `reviews` DROP FOREIGN KEY `reviews_fk1`;");
            DB::statement("ALTER TABLE `reviews` DROP FOREIGN KEY `reviews_fk2`;");
            DB::statement("ALTER TABLE `reviews` DROP FOREIGN KEY `reviews_fk3`;");
            DB::statement("ALTER TABLE `reviews` DROP FOREIGN KEY `reviews_fk4`;");
            DB::statement("ALTER TABLE `galleries` DROP FOREIGN KEY `galleries_fk0`;");
            DB::statement("ALTER TABLE `gallery_image` DROP FOREIGN KEY `gallery_image_fk0`;");
            DB::statement("ALTER TABLE `gallery_image` DROP FOREIGN KEY `gallery_image_fk1`;");
            DB::statement("ALTER TABLE `categories` DROP FOREIGN KEY `categories_fk0`;");
            DB::statement("ALTER TABLE `categories` DROP FOREIGN KEY `categories_fk1`;");
            DB::statement("ALTER TABLE `orders` DROP FOREIGN KEY `orders_fk0`;");
            DB::statement("ALTER TABLE `orders` DROP FOREIGN KEY `orders_fk1`;");
            DB::statement("ALTER TABLE `favorites` DROP FOREIGN KEY `favorites_fk0`;");
            DB::statement("ALTER TABLE `favorites` DROP FOREIGN KEY `favorites_fk1`;");
            DB::statement("ALTER TABLE `likes` DROP FOREIGN KEY `likes_fk0`;");
            DB::statement("ALTER TABLE `likes` DROP FOREIGN KEY `likes_fk1`;");
            DB::statement("ALTER TABLE `notifications` DROP FOREIGN KEY `notifications_fk0`;");
            DB::statement("ALTER TABLE `adverts` DROP FOREIGN KEY `adverts_fk0`;");
            DB::statement("ALTER TABLE `adverts` DROP FOREIGN KEY `adverts_fk1`;");
    }
}
