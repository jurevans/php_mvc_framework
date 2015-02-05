<?php

namespace BASE\Views;

require_once('BaseView.php');

class IndexView extends BaseView
{
        public function __construct()
        {
                parent::__construct();

		return 0;
        }

        public function render()
        {
                self::$smarty->assign('title', 'Custom App');
                self::$smarty->assign('heading', '- App');

                return self::$smarty->fetch( 'index.tpl' );
        }
}

?>
