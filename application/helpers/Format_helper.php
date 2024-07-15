<?php if ( ! defined('BASEPATH')) exit('No direct script access 
allowed');
if ( ! function_exists('formatNumber')) {
    
    function formatNumber($nb) {
        $modulo = $nb%1000;
        $mil = ($nb-$modulo)/1000;

        $result = $mil." ";
        for ($i=100; $i >= 10 && ($modulo % $i == $modulo) ; $i/=10) { 
            $result .= "0";
        }
        if($modulo != 0) $result .= $modulo;

        $result .= "MGA";
        return $result ;
    }
}