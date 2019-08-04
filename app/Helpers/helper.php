<?php

namespace App\Helpers;

/**
 * Fetches valid full flickr image.
 * If url_o attribute of flickr doesn't exist, fetch url_l attribute.
 * If either of them doesn't exist, fetch url_t => thumbnail attribute
 *
 * @param $flickrImage
 * @return mixed
 */
function fetchValidFlickrImage($flickrImage)
{
    if (isset($flickrImage['url_o'])) {
        return $flickrImage['url_o'];
    }

    if (isset($flickrImage['url_l'])) {
        return $flickrImage['url_l'];
    }

    return $flickrImage['url_t'];
}
