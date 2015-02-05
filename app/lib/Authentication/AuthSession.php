<?php

namespace Auth\Middleware;

require_once('lib/Authentication/CAS.php');

use \BASE\Models as Models;

class AuthSession extends \Slim\Middleware
{
	// ROUTE => ROLES

	private static $_NAMED_ROUTES_ = array();

	private static $_EXCLUDED_ROUTES_ = array( '/', '/reports/' );

	private static $_PROTECTED_ROUTES_ = array( '/admin/' => 'admin' );

	public function __construct( $args = array() )
	{
		// Merge any overrides passed to constructor, merge into "excluded routes" array
		self::$_EXCLUDED_ROUTES_ = array_merge(self::$_EXCLUDED_ROUTES_, $args);
	}

	public function call()
	{
        	// Hook onBeforeDispatch method to slim.before.dispatch event:
		$this->app->hook('slim.before.dispatch', array($this, 'onBeforeDispatch'));

        	// Hook onAfterDispatch method to slim.after.dispatch event:
		$this->app->hook('slim.after.dispatch', array($this, 'onAfterDispatch'));

		// Run inner middleware and application
		$this->next->call();
	}

	public function onBeforeDispatch()
    	{
		$named_routes = $this->app->router()->getNamedRoutes(); 
		$routes = array();

		// Example: $_SESSION['user'] should be set by CAS 
		$username = ( isset( $_SESSION['user'] ) ) ? $_SESSION['user'] : '';

		// USER roles should be defined in DB, e.g., $user_role = $user_model->getRoleByUsername( $_SESSION['user'] );
		$user_role = 'admin'; // Example

		// Restructure all "Named" Routes, removing excluded routes
		foreach($named_routes as $route)
		    if( !in_array( $route->getPattern(), self::$_EXCLUDED_ROUTES_ ) )
			self::$_NAMED_ROUTES_[] = $route->getPattern();

		$current_route = $this->app->router()->getCurrentRoute()->getPattern(); 

		$roles = ( in_array( $current_route, self::$_NAMED_ROUTES_ ) ) ?
			self::$_PROTECTED_ROUTES_[$current_route] :
			array('none');

		if( !in_array($user_role, $roles) )
			die('Unauthorized access');

		return false;
    	}

	public function onAfterDispatch()
	{
		return false;
	}

}

?>
