<?php

namespace Zento\PackageAssistant\Console\Foundation\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Zento\PackageAssistant\Console\Foundation\TraitGeneratorCommand;

class ModelMakeCommand extends \Illuminate\Foundation\Console\ModelMakeCommand
{
    use TraitGeneratorCommand;

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Model';
    }

    // protected function createController()
    // {
    //     $this->extend_module_for_call = true;
    //     return parent::createController();
    // }

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
