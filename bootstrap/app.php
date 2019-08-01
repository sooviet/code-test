<?php

	/**
	 * Main Application
	 *
	 * Auto Loads the base classes used in application
	 *
	 * @author  Soviet Ligal
	 */

	require_once __DIR__.'/../vendor/autoload.php';


	/*
	 * ------------------------------------------------------
	 *  Define base path of application
	 * ------------------------------------------------------
	 */
	define('BASEPATH', __DIR__.'/../');

	/*
	 * ------------------------------------------------------
	 *  Define app path
	 * ------------------------------------------------------
	 */
	define('APPPATH',  BASEPATH . '/app');


	define('CONFIG_FILE_PATH',  BASEPATH . '/config');


	/*
	 * Instantiate the Application class
	 *
	 */
	$app = new \App\Core\Application();


	/**
	 * Register routes
	 *
	 * @var TYPE_NAME $app
	 */
	$app->route('/', function() {
		return "FLICKR MINI APP";
	});


	/**
	 * Register routes
	 *
	 * @var TYPE_NAME $app
	 */
	$app->route('/imageGallery', function() {
		$appController = new \App\Controllers\AppController();

		return $appController->run();
	});


	//fetch requested url path
	$request = $_SERVER['REQUEST_URI'];


	//execute the route
	$app->executeRoutes($request);


	return $app;
