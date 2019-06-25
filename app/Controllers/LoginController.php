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
class LoginController extends RenderPages {

    //put your code here
    public function getIndex() {
        return $this->render('login.twig');
    }

    public function postIndex() {
        extract($_POST);

        if (isset($username) && isset($password)) {
            $login = AppServices::getlogin($username, $password);
            if ($login->succes) {
                //defino la sesión que demuestra que el usuario está autorizado
                $_SESSION['userId'] = $login->userId;
            }
            echo json_encode($login);
        } else {
            echo json_encode(array('error' => false, 'mensaje' => 'No data sent'));
        }
    }

}
