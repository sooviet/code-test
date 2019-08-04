<?php

namespace App\Library\Flickr;

use Exception;

class Request
{
    /*
     * Flickr api
     *
     * */
    private $app;


    /*
     * Parameters to be used in flickr request
     *
     * */
    private $parameters;


    /*
     * Response from flickr request
     *
     * */
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
        return http_build_query($this->parameters);
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


    /**
     * Checks if the response is success
     *
     * @return bool
     */
    public function isSuccessResponse()
    {
        switch ($this->app->getConfig()['format']) {
            case 'json':
                $reponse = $this->getResponseJson();
                return $reponse->stat === 'ok' ? true : false;
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
    public function send()
    {
        $url = $this->app->getApiUrl() . '?' . $this->formattedUrlParams();

        $this->response = file_get_contents($url); //sends GET request to flickr api url
    }

}