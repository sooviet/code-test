<?php

	namespace App\Controllers;

	use App\Library\Template;

	class AppController extends Controller
	{
		/**
		 * AppController constructor.
		 */
		public function __construct()
		{
			$this->template = new Template();
		}


		/**
		 *
		 */
		public function run()
		{
			$data = ['key' => 'value'];

			$this->template->render('ImageGallery/imageGalleryList.php', $data);
		}
	}
