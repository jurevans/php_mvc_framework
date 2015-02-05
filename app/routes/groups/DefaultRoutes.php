<?php

// Include Controllers here

use BASE\Controllers as Controllers;

$app->get('/', function() 
{
	echo 'test';
})->name('getIndex');

?>
