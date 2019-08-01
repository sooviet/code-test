<?php

	namespace App\Core;

	class Application
	{

		/**
		 * Application constructor.
		 */
		public function __construct()
		{
			//
		}


		/**
		 * Routing method to execute the routes
		 *
		 * @param $path
		 */
		public function executeRoutes($path)
		{
			global $routes;

			if (!array_key_exists($path, $routes)) {
				echo '404'; return;
			}

			echo call_user_func($routes[$path]);
		}


		/**
		 * Register the path to the routes
		 *
		 * @param $path
		 * @param \Closure $callBack
		 */
		public function route($path, \Closure $callBack)
		{
			global $routes;

			$routes[$path] = $callBack;
		}
	}
