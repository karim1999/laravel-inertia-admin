<?php

namespace Karim\LaravelInertiaAdmin;

use Illuminate\Contracts\Http\Kernel;
use Karim\LaravelInertiaAdmin\Http\Middleware\ShareInertiaData;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Karim\LaravelInertiaAdmin\Commands\LaravelInertiaAdminCommand;
use App\Http\Middleware\HandleInertiaRequests;

class LaravelInertiaAdminServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-inertia-admin')
            ->hasConfigFile()
            ->hasViews()
            ->hasAssets()
            ->hasMigration('create_skeleton_table')
            ->hasCommand(LaravelInertiaAdminCommand::class);

        $kernel = $this->app->make(Kernel::class);

        $kernel->appendMiddlewareToGroup('web', ShareInertiaData::class);
        $kernel->appendToMiddlewarePriority(ShareInertiaData::class);

        if (class_exists(HandleInertiaRequests::class)) {
            $kernel->appendToMiddlewarePriority(HandleInertiaRequests::class);
        }
    }
}
