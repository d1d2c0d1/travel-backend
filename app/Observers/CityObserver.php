<?php

namespace App\Observers;

use App\Models\City;
use Illuminate\Support\Facades\Cache;

class CityObserver
{

    /**
     * On before save city
     *
     * @param City $city
     * @return void
     */
    public function updated(City $city): void
    {
        Cache::forget("locations.cities-{$city->country_id}-{$city->region_id}");
    }

}
