<?php
class App{

    public static $site_name = 'RESTORENT';
    public static $site_main_link = 'http://localhost/resto/';
    public static $variables = [];

    public static function setSiteName($value){

        self::$site_name = $value;

    }

    public static function setSiteMainLink($value){


        self::$site_main_link = $value;

    }

    public static function addToVariables(Array $values){


        foreach($values as $key => $value){

            $self::$variables[$key] = $value;

        }


    }

    public static function getSiteName(){

        return self::$site_name;

    }

    public static function getSiteMainLink(){


        self::$site_main_link = $value;

    }

    public static function getVariables($value = null){

        if($value == null){

            return self::$variables;

        }else{
            return self::$variables[$value];
        }


        

    }


}

$framework_app = new App();


$_SESSION["variables"]['site_name'] = $framework_app::getSiteName();