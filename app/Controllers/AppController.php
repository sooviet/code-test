<?php

namespace App\Controllers;

use App\Library\Config;
use App\Library\Flickr\Photos\SearchApi;
use App\Library\Flickr\Request;

class AppController extends Controller
{
    /**
     * AppController constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();

        //loads flickr config
        Config::load(BASEPATH . 'config/flickr.php');
    }


    /**
     * Home Page of the app
     *
     */
    public function home()
    {
        return $this->template->render('Home/index.php');
    }


    /**
     * Run the app.
     * Search images from flickr and display images
     *
     */
    public function run()
    {
        try {
            // fetch url parameter text and sanitizes the parameter
            // FILTER_SANITIZE_STRING strip tags, optionally strip or encode special characters.
            $text = isset($_GET['text']) ? filter_input(INPUT_GET,"text",FILTER_SANITIZE_STRING) : null;

            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $error = null;

            if (!$this->validate($page, 'numeric')) { //validate url parameter "page", checks if the value is numeric
                $error = "Validation Error. Page number must be numeric value.";
            }

            if ($text === '') { //if the text parameter is empty then set error message
                $error = "Please enter the text to search for photos.";
            }

            if ($text && !$error) {
                $flickrConfig = Config::get('flickr'); //set default flickr configs from config file

                //set additional flickr parameters into flickr Config object
                $flickrConfig['text'] = $text ? urlencode($text) : '';
                $flickrConfig['page'] = $page;
                $flickrConfig['extras'] = "url_t,url_o,url_l";

                $flickrPhotoAPI = new SearchApi($flickrConfig); //instantiate new Flickr Photos API

                $status = $flickrPhotoAPI->validateRequiredParams(); // validate required parameters before initiating flickr request

                if (!$status) {
                    // throw exception upon unsuccessful parameter validation
                    throw new \Exception($status, 902);
                }

                //set flickrConfigs into flickrPhotoApi
                $flickrPhotoAPI->setConfig($flickrConfig);

                //instantiate new Flickr Request class for Photo Api
                $request = new Request($flickrPhotoAPI);

                //send api request
                $request->send();

                $imageGalleryData = [];
                if (!$request->isSuccessResponse()) { //checks if the response is success
                    //if not success, throws exception
                    throw new \Exception("Flickr Api Error. Error Occured.", 901);
                }

                $imageGalleryData = json_decode($request->getResponse(), true);
            }
        } catch (\Exception $e) {
            //catches exception thrown during method execution
            // generate technical error report which can be used to log errors in files later
            //for now, only exception error code & message is sent to view template
            $technical_error =
                [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage()
                ];
        }

        return $this->template->render('ImageGallery/imageGalleryList.php',
            compact("text", "page", "imageGalleryData", "error", "technical_error"));
    }
}
