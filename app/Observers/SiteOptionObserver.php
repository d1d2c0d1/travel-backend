<?php

namespace App\Observers;

use App\Models\SiteOption;
use Illuminate\Support\Facades\Cache;

class SiteOptionObserver
{
    /**
     * Handle the SiteObserver "created" event.
     *
     * @param  \App\Models\SiteOption  $siteOption
     * @return void
     */
    public function created(SiteOption $siteOption)
    {
        Cache::put("site_option_id/{$siteOption->id}", $siteOption, SiteOption::TIME_CACHE);
        Cache::put("site_option_code/{$siteOption->code}", $siteOption, SiteOption::TIME_CACHE);
    }

    /**
     * Handle the SiteObserver "updated" event.
     *
     * @param  \App\Models\SiteOption  $siteOption
     * @return void
     */
    public function updated(SiteOption $siteOption)
    {
        $keyId = "site_option_id/{$siteOption->id}";
        $keyCode = "site_option_code/{$siteOption->code}";
        Cache::forget($keyId);
        Cache::forget($keyCode);
        Cache::put($keyId, $siteOption, SiteOption::TIME_CACHE);
        Cache::put($keyCode, $siteOption, SiteOption::TIME_CACHE);

    }
}
