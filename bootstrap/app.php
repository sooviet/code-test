<?php

	/**
	 * Main Application
	 *
	 * Auto Loads the base classes used in application.
	 * Register Routes used in application
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


	/*
	 * ------------------------------------------------------
	 *  Config folder path
	 * ------------------------------------------------------
	 */
	define('CONFIG_FILE_PATH',  BASEPATH . '/config');


    $dotenv = Dotenv\Dotenv::create(BASEPATH);
    $dotenv->load();

    /*
     * Set Error reporting for multiple environment
     *
     * */
    switch (getenv("APP_ENV")) {
        case 'local':
        case 'staging':
            error_reporting(E_ALL);
            break;

        case 'production':
            error_reporting(0);
            break;
    }


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
        $appController = new \App\Controllers\AppController();

		return $appController->home();
	});


	/**
	 * Register routes
	 *
	 * @var TYPE_NAME $app
	 */
	$app->route('/image-gallery', function() {
		$appController = new \App\Controllers\AppController();

		return $appController->run();
	});


	//fetch requested url path
	$request = $_SERVER['REQUEST_URI'];


	//execute the route
	$app->executeRoutes($request);


	return $app;
