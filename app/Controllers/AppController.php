<?php

	namespace App\Controllers;

	use App\Library\Config;
	use App\Library\Flickr\Photos\SearchApi;
	use App\Library\Flickr\Request;

	class AppController extends Controller
	{
		/**
		 * AppController constructor.
		 *
		 */
		public function __construct()
		{
			parent::__construct();

			//loads flickr config
			Config::load(BASEPATH . 'config/flickr.php');
		}


		/**
		 * Run the app
		 *
		 */
		public function run()
		{
			$text = isset($_GET['text']) ? $_GET['text'] : null;
			$page = isset($_GET['page']) ? $_GET['page'] : 1;

			if ($text === '') {
				$error = "Please enter the text to search for photos.";
			}

			if ($text) {

				$flickrConfig = Config::get('flickr'); //set default flickr configs

				//set additional flickr parameters into flickrConfig object
				$flickrConfig['extras'] = 'url_t,url_l';
				$flickrConfig['text'] = $text ? $text : '';
				$flickrConfig['page'] = $page;

				//var_dump($flickrConfig); die;

				$flickrPhotoAPI = new SearchApi($flickrConfig); //instantiate new Photos API

				//set flickrConfigs into flickrPhotoApi
				$flickrPhotoAPI->setConfig($flickrConfig);

				//instantiate new Flickr Request class for Photo Api
				$request = new Request($flickrPhotoAPI);

				//send api request
				$request->send();

				$imageGalleryData = [];
				if($request->isSuccessResponse()) {
					$imageGalleryData = json_decode($request->getResponse(), true);
				}

			}

			$this->template->render('ImageGallery/imageGalleryList.php', compact("text", "page", "imageGalleryData", "error"));
		}

	}
