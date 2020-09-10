<?php
/**
 *
 * @copyright
 * @license
 * @author      Yongcheng Chen yongcheng.chen@live.com
 */

namespace Zento\PackageAssistant\Console;

use Zento\Kernel\Facades\PackageManager;
use Zento\Kernel\Facades\ThemeManager;
use Zento\Kernel\PackageManager\Console\Commands\Base;

class PackageGenCommand extends Base
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:package {name : package name}';

    protected $description = 'Create Custom Package to mypackages. Package name follows ACME_PackageName';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Start creating package.');
        $name = ucwords($this->argument('name'));
        $pathParts = PackageManager::splitPackageName($name);
        $packageRootPath = implode(DIRECTORY_SEPARATOR, $pathParts);
        $this->makeSubFolders($pathParts)->prepareStubs($packageRootPath, $name);
        $this->warn(sprintf('Package [%s] has been created.', $name));
        $this->warn(sprintf('Please check %s ', PackageManager::myPackageRootPath($packageRootPath)));
        return 0;
    }

    protected function getPackageSubFolders()
    {
        return [
            'Config', 'Console',
            'Http',
            'Http/Controllers', 'Http/Controllers/Api', 'Http/Controllers/Web',
            'Http/Middleware',
            'Model',
            'Providers', 'Providers/Facades',
            'Services',
            'routes',
            'resources',
            'resources/assets', 'resources/lang', 'resources/views',
            'resources/vue', 'resources/vue/components', 'resources/vue/pages',
            'setup', 'setup/database',
        ];
    }

    protected function makeSubFolders($pathParts)
    {
        $packageVendorPath = PackageManager::myPackageRootPath($pathParts[0]);
        if (!file_exists($packageVendorPath)) {
            mkdir($packageVendorPath, 0755, true);
        }

        $packagePath = PackageManager::myPackageRootPath(implode(DIRECTORY_SEPARATOR, $pathParts));
        if (file_exists($packagePath)) {
            $this->error(sprintf('Package path=[%s] already exists, please check first.', $packagePath));
            die;
        }

        mkdir($packagePath, 0755, true);
        $folders = $this->getPackageSubFolders();

        foreach ($folders as $folder) {
            $path = $packagePath . DIRECTORY_SEPARATOR . $folder;
            mkdir($path, 0755, true);
        }
        return $this;
    }

    private function prepareStubs($packagePath, $packageFullName)
    {
        $stubsPath = sprintf('%s/../stubs', __DIR__);
        ThemeManager::addLocation($stubsPath);

        PackageManager::myPackageRootPath($packagePath);
        $items = [
            [
                'from' => '_zento_assembly',
                'to' => '_zento_assembly.php',
                'type' => 'blade',
            ],
            [
                'from' => 'config.admin',
                'to' => 'Config/Admin.php.example',
                'type' => 'blade',
            ],
            [
                'from' => 'providers.plugin',
                'to' => 'Providers/Plugin.php.example',
                'type' => 'blade',
            ],
            [
                'from' => 'resources/vue/_frontend.asm.js.example',
                'to' => 'resources/vue/_frontend.asm.js.example',
                'type' => 'direct',
            ],
            [
                'from' => 'resources/vue/_backend.asm.js.example',
                'to' => 'resources/vue/_backend.asm.js.example',
                'type' => 'direct',
            ],
            [
                'from' => 'routes/api.php.example',
                'to' => 'routes/api.php.example',
                'type' => 'direct',
            ],
            [
                'from' => 'routes/web.php.example',
                'to' => 'routes/web.php.example',
                'type' => 'direct',
            ],
        ];

        foreach ($items as $item) {
            switch ($item['type']) {
                case 'blade':
                    $content = view(sprintf('package_templates.%s', $item['from']),
                        [
                            'packageNamespace' => PackageManager::getNameSpace($packageFullName),
                            'packageName' => $packageFullName,
                        ]
                    )->render();
                    file_put_contents(PackageManager::myPackageRootPath($packagePath, [$item['to']]), $content);
                    break;
                default:
                    copy(sprintf('%s/package_templates/%s', $stubsPath, $item['from']), PackageManager::myPackageRootPath($packagePath, [$item['to']]));
                    break;
            }
        }
        return $this;
    }

}
