<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class ItemTypeObserver
{
    /**
     * On before save city
     *
     * @param City $city
     * @return void
     */
    public function create(City $city): void
    {
        Cache::forget("locations.cities-{$city->country_id}-{$city->region_id}");
    }

}
