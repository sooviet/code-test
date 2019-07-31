<?php

	namespace App\Controllers;

	class Controller
	{

		/**
		 * The middleware defined on the controller.
		 *
		 * @var array
		 */
		protected $middleware = [];

		/**
		 * Define a middleware on the controller.
		 *
		 * @param  string  $middleware
		 * @param  array  $options
		 * @return void
		 */
		public function middleware($middleware, array $options = [])
		{
			$this->middleware[$middleware] = $options;
		}

	}
