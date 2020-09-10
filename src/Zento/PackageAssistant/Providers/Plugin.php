<?php

namespace Zento\PackageAssistant\Providers;

use Illuminate\Database\MigrationServiceProvider as LaravelBaseMigrationServiceProvider;
use Illuminate\Foundation\Providers\ArtisanServiceProvider as LaravelBaseArtisanServiceProvider;
use Illuminate\Support\ServiceProvider;
use Zento\Kernel\Providers\ConsoleSupportServiceProvider;

class Plugin extends ServiceProvider
{
    public function register()
    {
        ConsoleSupportServiceProvider::replaceProvider(LaravelBaseArtisanServiceProvider::class, ArtisanServiceProvider::class);
        ConsoleSupportServiceProvider::replaceProvider(LaravelBaseMigrationServiceProvider::class, MigrationServiceProvider::class);
    }
}
