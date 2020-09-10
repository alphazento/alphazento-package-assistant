<?php

namespace Zento\PackageAssistant\Console\Foundation\DatabaseConsole;

use Illuminate\Database\Console\Migrations\MigrateMakeCommand as LaravelBaseMigrateMakeCommand;
use Illuminate\Support\Str;
use Zento\Kernel\Facades\PackageManager;

class MigrateMakeCommand extends LaravelBaseMigrateMakeCommand
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'make:migration {package : The name of the package}
        {name : The name of the migration}
        {--create= : The table to be created}
        {--table= : The table to migrate}
        {--path= : The location where the migration file should be created}
        {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
        {--fullpath : Output the full path of the migration}';

    /**
     * Get migration path (either specified by '--path' option or default location).
     *
     * @return string
     */
    protected function getMigrationPath()
    {
        if (!is_null($targetPath = $this->input->getOption('path'))) {
            return !$this->usingRealPath()
            ? $this->laravel->basePath() . '/' . $targetPath
            : $targetPath;
        }

        $pathParts = PackageManager::splitPackageName($this->argument('package'));
        return PackageManager::myPackageRootPath($pathParts[0],
            [$pathParts[1], 'setup/database']);
    }
}
