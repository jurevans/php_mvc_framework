<?php
	define('VERSION', '1.0');

	// $app_mode = 'local';
	$app_mode = 'development';
	// $app_mode = 'production';

	$loc_path      = '/path/to/local/app/';
	$dev_path      = '/path/to/dev/app/';
	$prd_path      = '/path/to/production/app/';
	$dev_url_base  = '/~name/path/to/app/public/'; // "/public/" includes "index.php", where all requests are sent

	switch ( $app_mode )
	{
		case 'local':
			define('APP_DIR', $loc_path);
			break;
		case 'development':
			define('APP_DIR', $dev_path);
			break;
		case 'production':
			define('APP_DIR', $prd_path);
			break;
		default:
			break;
	}

	define('API_DIR', APP_DIR . 'api/');
        define('SMARTY_DIR', API_DIR . 'vendor/Smarty/');
	// APP_BASE_URL should point to the public/ directory - remember to append a '/' !!!
	// This set the base "public/" directory for all View Assets
	define('APP_BASE_URL', $dev_url_base);
	define('UPLOAD_DIR', APP_DIR . 'public/images/upload/');
?>
