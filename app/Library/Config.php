<?php

	namespace App\Library;

	class Config
	{
		static private $data;

		/**
         * Loads the config file values as data
         *
		 * @param $configFile
		 */
		static public function load($configFile) {
			self::$data = include($configFile);
        }


		/**
         * Get config value from config file
         *
		 * @param $key
		 * @return mixed
		 */
		static public function get($key) {
			return self::$data[$key];
		}


		/**
         * Get data from config file
         *
		 * @return mixed
		 */
		public static function getData()
		{
			return self::$data;
		}
	}