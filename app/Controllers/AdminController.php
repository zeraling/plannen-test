<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use App\RenderPages;
use App\Services\AppServices;

/**
 * Description of HotelesController
 *
 * @author sapc_
 */
class AdminController extends RenderPages {

    //put your code here
    public function getIndex() {

        $data['listaProspecto'] = AppServices::getLista();

        return $this->render('admin.twig', $data);
    }

}
