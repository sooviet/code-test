<?php

namespace App\Library\Flickr;

class Flickr
{

    const API_URL = "https://api.flickr.com/services/rest";

    const API_RESPONSE_FORMAT = "json";

    const API_RESPONSE_PER_PAGE = 5;

    const API_NO_JSON_CALLBACK = 1;

    protected $config;

    /*
     * Default config parameter list to be added as url params connecting to flickr api
     *
     * */
    protected static $defaultConfig = [
        'format' => self::API_RESPONSE_FORMAT,
        'per_page' => self::API_RESPONSE_PER_PAGE,
        'nojsoncallback' => self::API_NO_JSON_CALLBACK,
    ];

    protected $requiredParamsList = ['api_key']; // required parameter list for connecting to FLickr API

    /**
     * Flickr constructor.
     *
     * @param $config
     */
    public function __construct($config)
    {
        $this->setConfig($config);
    }


    /**
     * Set configs
     *
     * @param $config
     * @return array
     */
    public function setConfig($config)
    {
        //replace default configs with new config
        $this->config = array_replace_recursive(
            self:: $defaultConfig,
            $config
        );
        return $this->config;
    }


    /**
     * Get configs
     *
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }


    /**
     * Validate required parameters
     * If required parameter is not found in config array,
     * then trigger validation error & return error message
     *
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
     * Get flickr api url
     *
     * @return string
     */
    public function getApiUrl()
    {
        return self::API_URL;
    }

}