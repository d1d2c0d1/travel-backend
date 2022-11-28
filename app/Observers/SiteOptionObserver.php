<?php

namespace App\Observers;

use App\Models\SiteOption;
use Illuminate\Support\Facades\Cache;

class SiteOptionObserver
{
    /**
     * Handle the SiteOption "created" event.
     *
     * @param  \App\Models\SiteOption  $siteOption
     * @return void
     */
    public function created(SiteOption $siteOption)
    {
        $keyAll = "site_option_all";
        Cache::forget($keyAll);
        Cache::put("site_option_id/{$siteOption->id}", $siteOption, SiteOption::TIME_CACHE);
        Cache::put("site_option_code/{$siteOption->code}", $siteOption, SiteOption::TIME_CACHE);
    }

    /**
     * Handle the SiteOption "updated" event.
     *
     * @param  \App\Models\SiteOption  $siteOption
     * @return void
     */
    public function updated(SiteOption $siteOption)
    {
        $keyAll = "site_option_all";
        $keyId = "site_option_id/{$siteOption->id}";
        $keyCode = "site_option_code/{$siteOption->code}";
        Cache::forget($keyId);
        Cache::forget($keyCode);
        Cache::forget($keyAll);
        Cache::put($keyId, $siteOption, SiteOption::TIME_CACHE);
        Cache::put($keyCode, $siteOption, SiteOption::TIME_CACHE);
    }

    public function deleted(SiteOption $siteOption)
    {
        $keyAll = "site_option_all";
        $keyId = "site_option_id/{$siteOption->id}";
        $keyCode = "site_option_code/{$siteOption->code}";
        Cache::forget($keyId);
        Cache::forget($keyAll);
        Cache::forget($keyCode);
    }

}
