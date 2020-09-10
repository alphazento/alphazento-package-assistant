<?php

namespace Zento\PackageAssistant\Console\Foundation\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Zento\PackageAssistant\Console\Foundation\TraitGeneratorCommand;

class ProviderMakeCommand extends \Illuminate\Foundation\Console\ProviderMakeCommand
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
