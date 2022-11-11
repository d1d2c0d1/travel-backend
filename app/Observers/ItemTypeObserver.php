<?php

namespace App\Observers;

use App\Models\ItemType;
use Illuminate\Support\Facades\Cache;

class ItemTypeObserver
{
    /**
     * On before save city
     *
     * @param City $city
     * @return void
     */
    public function deleted(ItemType $type): void
    {
        $keyTag = "locations.city.tag.type-{$type->id}";
        $cache = Cache::pull($keyTag);
        if (!$cache) {
            return;
        }
        foreach ($cache as $key=>$value) {
            Cache::forget($value);
        }
    }

}
