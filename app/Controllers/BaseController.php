<?php

namespace BASE\Controllers;

class BaseController 
{
	public function __construct()
	{
		return 0;
	}	

	// COMMON Controller Methods

	protected static function _formatData($data, $fields)
	{
                $field_keys = array_keys($fields);   
                $results    = array();

		if(sizeof($data) > 1)
		{
			foreach($data as $result)
			{
				$row = array();                                                                   
				
				foreach($field_keys as $key)
					$row[$key] = $result[$fields[$key]];

				$results[] = $row;
			}
		
		}
		else if(sizeof($data) === 0)
		{
			$results = null;
		}
		else
		{
			$row = array();

			foreach($field_keys as $key)
                        	$row[$key] = $data[$fields[$key]];

			$results[] = $row;
		}

		return $results;
	}
}

?>
