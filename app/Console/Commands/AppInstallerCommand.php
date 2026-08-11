<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppInstallerCommand extends Command
{
    protected $signature = 'app:install';

    protected $description = 'Fresh migrate, migrate modules, and seed database';

    public function handle(): int
    {
        $this->call('migrate:fresh');
        foreach (glob(base_path('modules/*/database/migrations')) as $path) {
            $this->call('migrate', [
                '--path' => str_replace(base_path() . DIRECTORY_SEPARATOR, '', $path),
                '--force' => true,
            ]);
        }

        $this->call('db:seed');
        $this->info('Database migrated and seeded successfully.');

        return self::SUCCESS;
    }
}
