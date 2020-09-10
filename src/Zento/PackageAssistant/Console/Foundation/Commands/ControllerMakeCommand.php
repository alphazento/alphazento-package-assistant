<?php

namespace Zento\PackageAssistant\Console\Foundation\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand as LaravelBaseControllerMakeCommand;
use Symfony\Component\Console\Input\InputArgument;
use Zento\PackageAssistant\Console\Foundation\TraitGeneratorCommand;

class ControllerMakeCommand extends LaravelBaseControllerMakeCommand
{
    use TraitGeneratorCommand;

    protected function getDefaultNamespace($rootNamespace)
    {
        if ($this->option('api')) {
            return parent::getDefaultNamespace($rootNamespace) . '\Api';
        }
        return parent::getDefaultNamespace($rootNamespace) . '\Web';
    }

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
