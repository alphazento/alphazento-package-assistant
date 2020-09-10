<?php

namespace Zento\PackageAssistant\Console\Foundation\Commands;

use Illuminate\Foundation\Console\ConsoleMakeCommand as BaseConsoleMakeCommand;
use Symfony\Component\Console\Input\InputArgument;
use Zento\PackageAssistant\Console\Foundation\TraitGeneratorCommand;

class ConsoleMakeCommand extends BaseConsoleMakeCommand
{
    use TraitGeneratorCommand;

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $parts = array_slice(explode('/', __FILE__), 0, -1);
        $parts[] = 'stubs/console.stub';

        return implode('/', $parts);
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
