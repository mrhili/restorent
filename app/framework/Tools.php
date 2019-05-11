<?php

class Tools extends Conf{
    public static function deepdebug(  ){
        ini_set('display_errors', 'On');
        //E_ALL | E_STRICT
        error_reporting(E_ALL);
    }

    //if string vardump if not printr
    public static function debug( $todebug ){
        echo '<pre>';
        if( is_array( $todebug ) ){

            print_r ( $todebug);
        }else{
            var_dump($todebug);
        }
        echo '</pre>';
    }
}
$framework_tools = new Tools();