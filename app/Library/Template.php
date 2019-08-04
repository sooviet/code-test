<?php

namespace App\Library;

class Template
{
    /**
     * Base path of template
     *
     * @var string
     */
    private $templatePath = BASEPATH . 'resources/';


    /**
     * Get base path of the templates
     *
     * @return string
     */
    private function getRootPath()
    {
        return $this->templatePath;
    }


    /**
     * Render the template along with variables
     *
     * @param $path
     * @param array $data
     * @return void
     */
    public function render($path, $data = [])
    {
        foreach ($data as $index => $value) {
            $data[$index] = $value;
        }

        include $this->getRootPath() . $path;
    }

}