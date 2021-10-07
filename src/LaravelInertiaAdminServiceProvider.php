<?php

namespace Karim\LaravelInertiaAdmin;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Karim\LaravelInertiaAdmin\Commands\LaravelInertiaAdminCommand;

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
            ->name('skeleton')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_skeleton_table')
            ->hasCommand(LaravelInertiaAdminCommand::class);
    }
}
