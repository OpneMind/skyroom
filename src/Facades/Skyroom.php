<?php

namespace OpneMind\Skyroom\Facades;

use Illuminate\Support\Facades\Facade;

class Skyroom extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'skyroom';
    }
}
