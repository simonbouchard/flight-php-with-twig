<?php
/**
 *
 * @category Framework
 * @package  boilerplate-flight-php-twig
 * @author   Simon Bouchard <info@simonbouchard.com>
 * @license  MIT
 * @version  https://gitlab.com/simonbouchard/boilerplate-flight-php-twig.git
 */

 /*
 *****************************************************
 Load the composer dependencies
 *****************************************************
 */

require './vendor/autoload.php';

/*
*****************************************************
Twig Support
*****************************************************
*/

Flight::set('flight.views.path',  './templates');
Flight::set('flight.compiled.views.path', './templates/cache');

// Set the view renderer use twig. Before deploying to prod. activate the cache and
// set the web user allowed to read/write from/to the folder.
$loader = new Twig_Loader_Filesystem(Flight::get('flight.views.path'));
$twigConfig = array(
	'cache'	=>	Flight::get('flight.compiled.views.path'),
	'cache'	=>	false,
	'debug'	=>	true,
);

// Sets twig as the view handler for Flight.
Flight::register('view', 'Twig_Environment', array($loader, $twigConfig), function($twig) {
	$twig->addExtension(new Twig_Extension_Debug()); // Add the debug extension
});

// Map the call for ease of use.
Flight::map('render', function($template, $data){
	echo Flight::view()->render($template, $data);
});

/*
*****************************************************
App Variables
*****************************************************
*/

Flight::set('flight.log_errors', true);

/*
*****************************************************
Routing
Documentation: http://flightphp.com/learn/
*****************************************************
*/

Flight::route('/', function() {
    $data = [
        'bodyClass' => 'frontpage'
    ];
    Flight::render('index.twig', $data);
});

Flight::route('/@name', function ($name) {
    $data = [
        'bodyClass' => ''
    ];
    Flight::render('index.twig', $data);
});

Flight::map('error', function(Exception $ex){
    echo $ex->getTraceAsString();
    print "Oops, something went wrong!";
});

Flight::map('notFound', function(Exception $ex){
    echo $ex->getTraceAsString();
    print "Oops, this resource does not exist!";
});

/*
*****************************************************
Start
*****************************************************
*/

Flight::start();
