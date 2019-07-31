<?php

	/**
	 * Main Application
	 *
	 * Auto Loads the base classes used in application
	 *
	 * @author  Soviet Ligal
	 */

	/*
	 * ------------------------------------------------------
	 *  Define basepath of application
	 * ------------------------------------------------------
	 */
	define('BASEPATH', __DIR__.'/../');


	/*
	 * ------------------------------------------------------
	 *  Define app path
	 * ------------------------------------------------------
	 */
	define('APPPATH',  BASEPATH . '/app');


	require_once __DIR__.'/../vendor/autoload.php';


	/*
	 * Instantiate the app controller class
	 *
	 */
	$app = new \App\Controllers\AppController();


	/*
	 * Run the application
	 *
	 */
	$app->run();