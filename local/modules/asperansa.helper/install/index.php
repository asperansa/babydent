<?
#################################################
#   Developer: Lazareva N.                      #
#   E-mail: asperansa@gmail.com                 #
#   Copyright (c) 2014 Lazareva N.              #
#################################################

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

if (class_exists("asperansa_helper")) return;

class asperansa_helper extends CModule {

    var $MODULE_ID = "asperansa.helper";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;
    var $MODULE_GROUP_RIGHTS = "Y";

    function __construct() {

        $arModuleVersion = array();
        include(dirname(__FILE__)."/version.php");

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_NAME = Loc::getMessage("XPAGE_XPAGER_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("XPAGE_XPAGER_MODULE_DESCRIPTION");
        $this->PARTNER_NAME = Loc::getMessage('XPAGE_XPAGER_PARTNER_NAME');
        $this->PARTNER_URI = Loc::getMessage('XPAGE_XPAGER_PARTNER_URI');
    }

    function InstallFiles() {
        return true;
    }

    function UnInstallFiles() {
        return true;
    }

    function DoInstall() {
        RegisterModule($this->MODULE_ID);
        $this->InstallFiles();
    }

    function DoUninstall() {
        UnRegisterModule($this->MODULE_ID);
        $this->UnInstallFiles();
    }
}