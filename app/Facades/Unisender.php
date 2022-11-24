<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Unisender extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'unisender';
    }
}
