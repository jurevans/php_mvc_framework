PHP Common Framework
====================

Version 0.1

####PHP MVC Framework

The *PHP MVC Framework* utilizes a REST backend built in Slim PHP (providing *Routes*, *Middleware*, *Server-Side Caching*, *Generic Views*, etc.), the __Idiorm__ *ORM*, __Smarty Templates__, and components from __Symfony__.


The __Idiorm__ *ORM* implemented in the *Models* allows for abstractions and definitions
of the underlying database, including business logic and data manipulation (all queries are handled by this ORM, which also accepts raw SQL in part or full as needed). 

The *Controllers* are generally called by paths defined in the Routes and serve to delegate tasks and manage updates to the *Models* and *Views*. *Views* in the default application utilize __Smarty__ templates for HTML delivery and can receive a request for *JSON* data for API access from other clients. 


## Directory Overview (High-Level)

####Base:
```
/
/.htaccess
/php.ini
/README.md
/app/
/public/
/settings.php
```

####Public App 
*Note*: ```.htaccess``` rewrites requests to ```index.php``` when that URI points to a resource that is dynamic 
(ignoring static files which reside in the ```public/``` directory.

```
/public/
/public/index.php
/public/js/
/public/js/app.js
/public/js/vendor/
/public/css/
/public/css/app.css
/public/css/vendor/
/public/css/vendor/images/
/public/images/
```

####App Root:
```
/app/
/app/Core.php

/app/Models/
/app/Views/
/app/Controllers/

/app/lib/
/app/routes/
/app/tests/
/app/vendor/
```

####App Libraries
```
/app/lib/Authentication/
/app/lib/Authentication/Authentication.php
/app/lib/Authentication/AuthSession.php
/app/lib/Connection/
/app/lib/Connection/Connection.php
/app/lib/Connection/Config.php
/app/lib/Image/Image.php
```

####App Routes
```
/app/routes/
/app/routes/Routes.php
/app/routes/groups/
/app/routes/groups/*.php
```

####App View Templates and Smarty Directories
```
/app/smarty/templates/
/app/smarty/templates/*.tpl
/app/smarty/templates/index.tpl
/app/smarty/templates/include/
/app/smarty/templates/include/*.tpl
/app/smarty/templates/include/layout.tpl
/app/smarty/config/
/app/smarty/cache/
/app/smarty/templates_c/
```

####Third-party Vendor Code for APP
```
/app/vendor/
/app/vendor/Slim/
/app/vendor/Smarty/
/app/vendor/idiorm.php
```

####Other details within the Application: 

* __vendor__ indicates any third-party resource
* __lib__ indicates custom modules used througout the APP
* __routes__ indicates APP routing, grouping routes and included in `Routes.php`
* __public__ is specific to the client interface
* __scripts__ is where migration scripts and other server-side utilities are stored
* __templates__ includes *.tpl files for rendering HTML fragments
* __tests__ includes any APP tests we may wish to include
* `/app/Controllers/` stores application *controller* logic
* `/app/Models/` stores application *model* business logic
* `/app/Views/` stores application *views*, which render to templates or return JSON data

####Session Management:

* `/(App-base)/sessions/` - Stores sessions outside of public app directory

####Initializing the APP

The following code fragments illustrate how to *bootstrap* the APP in an application:

```php
require_once 'app/Core.php';

$config = array(
        'debug' => true
);

$base = new BASE( $config );
$base->init();

$app = \Slim\Slim::getInstance();

$app->get('/', function() use ($app) 
{
	$view = new IndexView(); // Assuming you have an IndexView class included
        echo  $view->render();
});

$app->run();
```

At this point, the `Slim` object can be referenced in any custom application via:

```php

$app_singleton_reference = \Slim\Slim::getInstance();
```

###Links to Components Used in this Application

* Slim Framework - http://www.slimframework.com/
* Symfony - http://symfony.com/
* Smarty Templates - http://www.smarty.net/
* Idiorm ORM (and Paris, an Active Record implementation based on Idiorm) - http://j4mie.github.io/idiormandparis/


