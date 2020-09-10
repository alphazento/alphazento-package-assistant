<?php

namespace Zento\PackageAssistant\Console\Foundation\Commands;

use Illuminate\Foundation\Console\JobMakeCommand as LaravelBaseJobMakeCommand;
use Symfony\Component\Console\Input\InputArgument;
use Zento\PackageAssistant\Console\Foundation\TraitGeneratorCommand;

class JobMakeCommand extends LaravelBaseJobMakeCommand
{
    use TraitGeneratorCommand;
    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['package', InputArgument::REQUIRED, 'The name of the package'],
            ['name', InputArgument::REQUIRED, 'The name of the command'],
        ];
    }
}
