<?php

	namespace App\Library\Flickr;

	class PhotosAPI extends Flickr {

		const METHOD_PHOTO_SEARCH = 'flickr.photos.search';

		/**
		 * PhotosAPI constructor.
		 * @param $userConfig
		 */
		public function __construct($userConfig)
		{
			parent::__construct($userConfig);
		}


		/**
		 * Function overloaded to setConfig
		 *
		 * @param $keyword
		 * @param $page
		 * @return array
		 */
		public function setConfig($config)
		{
			$config['method'] = self::METHOD_PHOTO_SEARCH;

			$this->config = array_replace_recursive(
				self:: $defaultConfig,
				$config
			);

			return $this->config;
		}

	}