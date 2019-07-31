<?php
	class Config
	{
		static private $data;

		/**
		 * @param $configFile
		 */
		static public function load($configFile) {
			self::$data = parse_ini_file($configFile, true, INI_SCANNER_RAW);
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