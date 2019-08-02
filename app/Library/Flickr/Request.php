<?php

	namespace App\Library\Flickr;

	use Exception;

	class Request
	{
		private $app;

		private $parameters;

		private $response;

		/**
		 * Request constructor.
		 *
		 * @param Flickr $flickr
		 */
		public function __construct(Flickr $flickr)
		{
			$this->app = $flickr;

			$this->parameters = $this->app->getConfig();
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
		 * Getter to get response as json from the sent request
		 *
		 * @return mixed
		 */
		public function getResponseJson()
		{
			return json_decode($this->response);
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


		public function isSuccessResponse()
		{
			switch ($this->app->getConfig()['format']) {
				case 'json':
					$reponse = $this->getResponseJson();
					return  $reponse->stat === 'ok' ?  true : false;
					break;

				default:
					return false;
					break;
			}
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