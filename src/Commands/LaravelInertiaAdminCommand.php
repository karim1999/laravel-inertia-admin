<?php

namespace Karim\LaravelInertiaAdmin\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class LaravelInertiaAdminCommand extends Command
{
    public $signature = 'admin:install';

    public $description = 'My command';

    public function handle()
    {
        $this->call("inertia:middleware");
        $this->comment('Publishing InertiaAdmin Assets...');
        $this->call('vendor:publish', ['--tag' => 'inertia-admin-assets']);
        $this->comment('All done');
    }
}
