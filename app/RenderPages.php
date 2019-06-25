<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

class RenderPages {

    protected $templateEngine;

    public function __construct() {

        $loader = new \Twig_Loader_Filesystem('resources/views'); //folder de vistas
        $this->templateEngine = new \Twig_Environment($loader, [
            'charset' => 'utf-8', 'cache' => false,
            'debug' => true,
        ]);

        $this->templateEngine->addGlobal('logged', isset($_SESSION['userId'])?true:false);
        $this->templateEngine->addGlobal('userId', isset($_SESSION['userId'])?$_SESSION['userId']:null);
        
        $this->templateEngine->addExtension(new \Twig_Extension_Debug());
        
        $this->templateEngine->addFilter(new \Twig_SimpleFilter('baseUrl', function ($path) {
            return BASE_URL . $path;
        }));
    }

    public function render($fileName, $data = []) {
        try {
            return $this->templateEngine->render($fileName, $data);
        } catch (\Twig_Error $exc) {
            echo '<pre>' . $exc . '</pre>';
        }
    }

}
