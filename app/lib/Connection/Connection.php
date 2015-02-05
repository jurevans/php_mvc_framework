<?php 

namespace BASE\Connection;

require_once('settings.php'); 

class Connection 
{
	private static $_db = '.dbconfig';

	public static function getDBConfig($db_conf_name = 'db')
	{
		$db_settings = array();

		if( file_exists( APP_DIR . self::$_db ) )
		{
			$db_settings = parse_ini_file( APP_DIR . self::$_db, true);

			return $db_settings[$db_conf_name];
		}

		return $db_settings;
	}
}
