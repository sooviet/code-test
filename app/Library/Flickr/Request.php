<?php

	namespace App\Library\Flickr;

	use Exception;

	class Request
	{
		private $app;

		private $parameters;

		private $response;

		private $config;

		/**
		 * Request constructor.
		 *
		 * @param Flickr $flickr
		 */
		public function __construct(Flickr $flickr)
		{
			$this->app = $flickr;

			$this->parameters = $this->app->getConfig();

			$this->config = $this->app->getConfig();
		}


		/**
		 * Get formatted Url Params
		 *
		 * @return mixed|string
		 */
		public function formattedUrlParams()
		{
			$params = '';
			foreach ($this->parameters as $paramKey => $paramValue) {
				$params .= '&' . $paramKey . '=' . $paramValue;
			}

			return $params;
		}


		/**
		 * Getter to get response from the sent request
		 *
		 * @return mixed
		 */
		public function getResponse()
		{
			return $this->response;
		}


		/**
		 * Send request
		 *
		 * @param array $params
		 * @return string
		 */
		public function send() {

			$url = $this->app->getApiUrl() . '?' . $this->formattedUrlParams();

			$this->response = file_get_contents($url);
		}

	}