<?php 

// API Routes

$app->group('/api', function() use ($app)
{
	/* API ROOT */

	$app->map('/', function() use ($app)
	{
		echo json_encode( array( 'BASE' => array( 'version' => BASE::$_version, 'configuration' => BASE::getConfig() ) ) );
	})->via('GET', 'POST')->name('API_ROOT');

}); 
