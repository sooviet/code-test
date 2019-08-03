<?php

	namespace App\Controllers;

	use App\Library\Template;

	/**
	 * Main Controller Class
     *
	 * */
	class Controller
	{
        /**
         *
         * Controller constructor.
         */
        public function __construct()
		{
			$this->template = new Template();
		}


        /**
         * simply validates the controller method's request data according to the rule
         *
         * @param $data
         * @param $rule
         * @return bool
         */
        public function validate($data, $rule)
        {
            switch ($rule) {
                case 'string':
                    return is_string($data) ? true : false;
                    break;

                case 'numeric':
                    return is_numeric($data) ? true : false;
                    break;

                default:
                    return false;
            }
		}
	}
