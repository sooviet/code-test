<?php

	namespace App\Library;

	class Config
	{
		static private $data;

		/**
		 * @param $configFile
		 */
		static public function load($configFile) {
			self::$data = include($configFile);
        }


		/**
		 * @param $key
		 * @return mixed
		 */
		static public function get($key) {
			return self::$data[$key];
		}


		/**
		 * @return mixed
		 */
		public static function getData()
		{
			return self::$data;
		}
	}