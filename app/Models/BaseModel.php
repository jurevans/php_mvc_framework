<?php

namespace BASE\Models;

require_once('api/vendor/idiorm.php');
require_once('api/lib/Connection/Connection.php');

use \BASE\Connection as Connection;

class BaseModel
{
	public function __construct()
	{
		$this->_setConfig( 'app-config' );
	}

	private function _setConfig( $configName = '' )
	{
		$config = Connection\Connection::getDBConfig( $configName );

		\ORM::configure( array(
                                'connection_string' => 'mysql:host=' . 
					$config['host'] . ';port=' . 
					$config['port'] . ';dbname=' . 
					$config['db'],
                                'username' => $config['user'],
                                'password' => $config['password'],
				'logging'  => true,
				'return_result_sets' => true
                        )
                );

		return true;
	}

	protected static function getQueryLog()
	{
		return \ORM::get_query_log();
	}

	protected static function getLastQuery()
	{
		return \ORM::get_last_query();
	}
	
	public function _formatData( $fieldMap, $results )
	{
		$data = array();

		foreach($results as $result)
		{
			$record = array();

			foreach($fieldMap as $key => $val)
				$record[$key] = $result[$val];	

			$data[] = $record;
		}

		return $data;
	}

	public function update( $fields, &$orm_obj )
	{
		$post_data = array();

		foreach($fields as $key => $db_field)
			if( isset( $_POST[$key] ) && $key !== 'id' )
				$post_data[$db_field] = $_POST[$key];
		
		$orm_obj->set( $post_data );
		$orm_obj->save();

		return json_encode($post_data);
	}
}

?>
