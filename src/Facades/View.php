<?php

namespace NF\Menu\Facades;

use Illuminate\Support\Facades\Facade;

class View extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new \NF\Menu\Services\View;
    }
}
