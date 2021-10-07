<?php

namespace Karim\LaravelInertiaAdmin\Commands;

use Illuminate\Console\Command;

class LaravelInertiaAdminCommand extends Command
{
    public $signature = 'skeleton';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
