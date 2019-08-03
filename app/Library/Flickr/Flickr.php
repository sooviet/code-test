<?php

	namespace App\Library\Flickr;

	class Flickr {

		const API_URL = "https://api.flickr.com/services/rest";

		const API_RESPONSE_FORMAT = "json";

		const API_RESPONSE_PER_PAGE = 5;

		const API_NO_JSON_CALLBACK = 1;

		protected $config;

		protected static $defaultConfig = [
			'format' => self::API_RESPONSE_FORMAT,
			'per_page' => self::API_RESPONSE_PER_PAGE,
			'nojsoncallback' => self::API_NO_JSON_CALLBACK,
		];

		protected $requiredParamsList = ['api_key'];

		/**
		 * Flickr constructor.
		 *
		 * @param $config
		 */
		public function __construct($config) {
			$this->setConfig($config);
		}


		/**
		 * @param $config
		 * @return array
		 */
		public function setConfig($config)
		{
			$this->config = array_replace_recursive(
				self:: $defaultConfig,
				$config
			);
			return $this->config;
		}


		/**
		 * @return mixed
		 */
		public function getConfig()
		{
			return $this->config;
		}


        /**
         * @return bool
         */
        public function validateRequiredParams()
        {
            $message = "Flickr API Validation Exception Occured. ";
            foreach ($this->requiredParamsList as $param) {
                if (!array_key_exists($param, $this->getConfig())) {
                    return $message .= 'Parameter-' . $param . ' is missing';
                }
            }
            return true;
		}


        /**
         * @return string
         */
        public function getApiUrl()
		{
			return self::API_URL;
		}

	}