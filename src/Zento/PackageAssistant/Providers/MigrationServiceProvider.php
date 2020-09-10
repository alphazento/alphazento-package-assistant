<?php

namespace Zento\PackageAssistant\Providers;

use Illuminate\Database\MigrationServiceProvider as LaravelBaseMigrationServiceProvider;
use Zento\PackageAssistant\Console\Foundation\DatabaseConsole\MigrateMakeCommand;

class MigrationServiceProvider extends LaravelBaseMigrationServiceProvider
{
    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMigrateMakeCommand()
    {
        $this->app->singleton('command.migrate.make', function ($app) {
            // Once we have the migration creator registered, we will create the command
            // and inject the creator. The creator is responsible for the actual file
            // creation of the migrations, and may be extended by these developers.
            $creator = $app['migration.creator'];

            $composer = $app['composer'];

            return new MigrateMakeCommand($creator, $composer);
        });
    }
}
