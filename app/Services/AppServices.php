<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services;

/**
 * Description of HotelesService
 *
 * @author sapc_
 */
class AppServices {

    //put your code here
    const urlBack = "https://plannen.com/appServices/test/";

    public static function getlogin($email,$pass) {

        $ch = curl_init();
        
        $params = array(
            'email' => $email,
            'pass'=>$pass
            );
        $url = self::urlBack . '/login.php' . '?' . http_build_query($params);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $resp = curl_exec($ch);
        curl_close($ch);

        if (!$resp) {
            return false;
        }
        $resp =  '{"succes":true,"resultMessage":"Inicio Correcto","userId":3}';
        return json_decode($resp);
    }

    public static function getLista() {

        $ch = curl_init();
        
        $params = array('userId' => $_SESSION['userId']);
        $url = self::urlBack . '/customers.php' . '?' . http_build_query($params);
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $resp = curl_exec($ch);
        curl_close($ch);

        if (!$resp) {
            return false;
        }

        return json_decode($resp);
    }
}
