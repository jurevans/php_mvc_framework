<?php

/*****************************
 CORE API => BASE
 ****************************/

require_once('vendor/Slim/Slim.php');

class BASE 
{
	public static $_version = '1.0.0';

        private static $_config;

        public function __construct($config = array())
        {
                \Slim\Slim::registerAutoloader();

                $app = new \Slim\Slim();
                self::$_config = $config;

                require_once('routes/Routes.php');
		return $app;
        }

        private static function _initMiddleware()
        {
                $app = \Slim\Slim::getInstance();
		require_once 'api/lib/Authentication/AuthSession.php';
		$app->add( new \Auth\Middleware\AuthSession() );

		return $app;
        }

        public function init()
        {
                // Initialize Middleware
                $app = self::_initMiddleware();

                $app->config(self::$_config);

                return $app;
        }

        public static function getConfig()
        {
                return json_encode(array( 'config' => self::$_config ));
        }
}

?>
