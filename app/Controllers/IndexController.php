<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use App\RenderPages;

/**
 * Description of HotelesController
 *
 * @author sapc_
 */
class IndexController extends RenderPages {
    //put your code here
    public function getIndex() {
        return $this->render('index.twig');
    }
}
