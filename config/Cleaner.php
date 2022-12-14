<?php

/**
 * Created by PhpStorm.
 * User: LouisDuf
 * Date: 05/12/2022
 * Time: 22:44
 */

namespace config;

use PDO;

class Cleaner {

    public static function NettoyageURL($url){
        filter_var($url,FILTER_SANITIZE_URL);
        return $url;
    }
    
    public static function NettoyageStr($chaine){
        filter_var($chaine, FILTER_SANITIZE_STRING);
        return $chaine;
    }
}