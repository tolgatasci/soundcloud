<?php

namespace Tolgatasci\Soundcloud\Facades;

use Illuminate\Support\Facades\Facade;

class Soundcloud extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'soundcloud';
    }
}
