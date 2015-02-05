<?php

// This index initializes the Base API

ini_set('display_errors',1);
error_reporting(-1);

require_once 'Core.php';
require_once 'app/Views/IndexView.php';

use BASE\Views as Views;

$config = array(
        'debug' => true//,
        //'templates.path' => 'api/smarty/templates/'
);

$base = new BASE( $config );
$app = $base->init();

// API Endpoint Base Route
$app->get('/', function() use ($app) 
{
	$view = new Views\IndexView();
	echo  $view->render();
});

$app->run();

?>
