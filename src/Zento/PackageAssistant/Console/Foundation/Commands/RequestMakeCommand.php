<?php

namespace Zento\PackageAssistant\Console\Foundation\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Zento\PackageAssistant\Console\Foundation\TraitGeneratorCommand;

class RequestMakeCommand extends \Illuminate\Foundation\Console\RequestMakeCommand
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
