<?php

namespace BASE\Views;

require_once('settings.php');
require_once(SMARTY_DIR . 'Smarty.class.php');

class BaseView
{
        public static $smarty;

        public function __construct()
        {
                self::$smarty = new \Smarty();

                self::$smarty->setTemplateDir(API_DIR . 'smarty/templates/');
                self::$smarty->setCompileDir(API_DIR . 'smarty/templates_c/');
                self::$smarty->setConfigDir(API_DIR . 'smarty/configs/');
                self::$smarty->setCacheDir(API_DIR . 'smarty/cache/');
		self::$smarty->assign('APP_BASE_URL', APP_BASE_URL);

        }
}

?>
