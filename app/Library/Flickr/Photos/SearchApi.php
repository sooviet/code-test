<?php

namespace App\Library\Flickr\Photos;

use App\Library\Flickr\Flickr;

class SearchApi extends Flickr
{

    const METHOD_PHOTO_SEARCH = 'flickr.photos.search';

    /**
     * PhotosAPI constructor.
     *
     * @param $userConfig
     */
    public function __construct($config)
    {
        parent::__construct($config);
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