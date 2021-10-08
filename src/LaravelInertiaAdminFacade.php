<?php

namespace Karim\LaravelInertiaAdmin;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Karim\LaravelInertiaAdmin\LaravelInertiaAdmin
 */
class LaravelInertiaAdminFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LaravelInertiaAdmin';
    }
}
