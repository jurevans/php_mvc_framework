<?php
#CLI
if (php_sapi_name() == 'cli') {
	$ENVIRONMENT = 'development'; 
	$INI_LOCATION = '/path/to/.dbconfig';
	$DATABASE_INI_INDEX = 'db_index_name'; 
	$UPLOAD_LOCATION = '/path/to/public/images/upload/';
	$SITE_ROOT = 'https://url_site_root/'; 
} 
# Development
else if (strpos($_SERVER['SCRIPT_URI'], 'https://development/url/') !== FALSE) {
	$ENVIRONMENT = 'development'; 
	$INI_LOCATION = '/path/to/.dbconfig';
	$DATABASE_INI_INDEX = 'db_index_name'; 
	$UPLOAD_LOCATION = '/path/to/public/images/upload/';
	$SITE_ROOT = 'https://url_site_root/'; 
}
# Live Environment	
else if (FALSE) {
	
}
else {
	echo 'Error: Not a recognized configuration.';
}
