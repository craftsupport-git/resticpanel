<?php

namespace Pterodactyl\Providers;

use Illuminate\Support\ServiceProvider;
use Pterodactyl\Extensions\Backups\BackupManager;
use Illuminate\Contracts\Support\DeferrableProvider;

class BackupsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the S3, Restic, and Borg backup disks.
     */
    public function register(): void
    {
        $this->app->singleton(BackupManager::class, function ($app) {
            return new BackupManager($app);
        });
    }

    public function provides(): array
    {
        return [BackupManager::class];
    }
}
