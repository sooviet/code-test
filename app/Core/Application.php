<?php

namespace App\Core;

use App\Library\Template;

class Application
{

    /**
     * Application constructor.
     */
    public function __construct()
    {
        //
    }


    /**
     * Routing method to execute the routes
     *
     * @param $path
     */
    public function executeRoutes($path)
    {
        global $routes;

        $path = $this->parsePath($path);

        //if path doesn't exist in routes, render 404 page
        if (!array_key_exists($path, $routes)) {
            $template = new Template();
            $template->render("Errors/404page.php");
        }

        echo call_user_func($routes[$path]);
    }


    /**
     * Register the path to the routes
     *
     * @param $path
     * @param \Closure $callBack
     */
    public function route($path, \Closure $callBack)
    {
        global $routes;

        $routes[$path] = $callBack;
    }


    /**
     * Parses incoming url path
     *
     * @param $path
     * @return bool|string
     */
    private function parsePath($path)
    {
        //checks if "?" is contained in the url path to match the route path
        if (strpos($path, '?') !== false) {

            //removes characters after "?" in the url path
            $path = substr($path, 0, strrpos($path, '?'));
        }

        return $path;
    }

}
