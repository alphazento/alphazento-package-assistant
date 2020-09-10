<?php
namespace Zento\PackageAssistant\Console\Foundation;

use Illuminate\Support\Str;
use Zento\Kernel\Facades\PackageManager;

trait TraitGeneratorCommand
{
    /**
     * Get the full namespace for a given class, without the class name.
     *
     * @param  string  $name
     * @return string
     */
    protected function getNamespace($name)
    {
        $packageNamespace = PackageManager::getNamespace($this->argument('package')) . '\\';
        $name = Str::replaceFirst($this->laravel->getNamespace(), $packageNamespace, $name);
        return trim(implode('\\', array_slice(explode('\\', $name), 0, -1)), '\\');
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $packageNamespace = PackageManager::getNamespace($this->argument('package')) . '\\';
        $name = Str::replaceFirst($this->laravel->getNamespace(), $packageNamespace, $name);
        return PackageManager::myPackageRootPath(str_replace('\\', '/', $name) . '.php');
    }

    /**
     * Get the full namespace for a given class, without the class name.
     *
     * @param  string  $name
     * @return string
     */
    protected function parseNamespace($name)
    {
        return trim(implode('\\', array_slice(explode('\\', $name), 0, -1)), '\\');
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->parseNamespace($name) . '\\', '', $name);

        return str_replace(['DummyClass', '{{ class }}', '{{class}}'], $class, $stub);
    }
}
