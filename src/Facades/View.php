<?php

namespace Vicoders\Menu\Facades;

use Illuminate\Support\Facades\Facade;

class View extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new \Vicoders\Menu\Services\View;
    }
}
