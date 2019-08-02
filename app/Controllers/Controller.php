<?php

	namespace App\Controllers;

	use App\Library\Template;

	class Controller
	{
		public function __construct()
		{
			$this->template = new Template();
		}
	}
