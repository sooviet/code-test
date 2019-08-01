<?php

	namespace App\Controllers;

	use App\Library\Config;
	use App\Library\Flickr\PhotosAPI;
	use App\Library\Flickr\Request;
	use App\Library\Template;

	class AppController extends Controller
	{
		/**
		 * AppController constructor.
		 */
		public function __construct()
		{
			Config::load(BASEPATH . 'config/flickr.php');

			$this->template = new Template();

			$this->config = Config::get('flickr');

			$this->flickrPhotoAPI = new PhotosAPI($this->config);
		}


		/**
		 * Run the app
		 *
		 */
		public function run()
		{
			$this->config['page'] = 2;
			$this->config['per_page'] = 5;
			$this->config['text'] = 'computers';

			$this->flickrPhotoAPI->setConfig($this->config);

			$request = new Request($this->flickrPhotoAPI);
			$request->send();

			$this->template->render('ImageGallery/imageGalleryList.php', $request);
		}

	}
