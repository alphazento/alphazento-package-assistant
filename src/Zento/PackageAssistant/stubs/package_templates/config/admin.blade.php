<?php echo "<?php"; ?>

namespace {{ $packageNamespace }}\Config;

use Zento\Acl\Providers\Facades\Acl;

class Admin extends \Zento\Backend\Config\AbstractAdminConfig
{
    protected function _registerDashboardMenus()
    {}

    /**
     * register configuration menus
     */
    protected function _registerDynamicConfigItemMenus()
    {}

    protected function _registerDataTableSchemas(&$data)
    {}

    protected function _registerDynamicConfigItemGroups(&$data)
    {}

    protected function _registerModelDefines(&$data)
    {}
}
