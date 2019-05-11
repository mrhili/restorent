<?php
class Route extends Utilities{

    //input -> ['key' => 1 , 'key2' => 2]
    //output -> 'key=1&key2=2'
    public static function parameterizer(Array $params){
        $counter = 1;
        $string = '';
        foreach($params as $key => $param ){
            
            $string.= urlencode($key).'='. urlencode($param);
            if($counter != 1 && $counter != count( $params ) ){
                $string.='&';
            }
            
            $counter++;
        }
        $counter = null;
        return  $string ;
    }

    public static function go($name, $params = null, $urlencode = False ){
        $string = 'Location: '. $name . '.php';
        // if params == null we will go
        if($params == null){
            header($string);

        // if there is params
            
        }elseif(is_array($params) ){
            header($string.'?'. self::parameterizer( $params) );
        }else{
            $urlencode? header($string.'?'. urlencode( $params) ): header($string.'?'. $params );
        }
    }




    public static function goViewsBack($name, $params = null, $urlencode = False ){

        self::go('views/back/'.$name, $params, $urlencode);

    }

    public static function go2Index($name= 'index', $params = null, $urlencode = False ){

        self::goViewsBack($name , $params, $urlencode);

    }

    public static function goDirect2Index($name= 'index', $params = null, $urlencode = False ){


        $string = 'Location: '. self::$site_main_link . 'views/back/index.php';
        header($string);
    }

    public static function goDirect2($name= 'index', $params = null, $urlencode = False ){

        $string = 'Location: '. self::$site_main_link . 'views/back/'.$name.'.php';
        header($string);
    }

///////////////////////////////FROM CONTROLLER///////////////////////

///////////////////////////////FROM ROOT///////////////////////


///////////////////////////////FROM VIEWS///////////////////////


    public static function from2($from = 'views', $to = 'views', $file='', $redirect = false){
        $string ='';
        if($from == $to ){
            
        }elseif($from == 'back' && $to == 'controllers'){
            $string ='../../app/controllers/';
        }elseif($from == 'controllers' && $to == 'back'){
            $string ='../../views/back/';
        }elseif($from == 'root' && $to == 'back'){
            $string ='views/back/';
        }


        $string = $string.$file.'.php';



        if( $redirect ){

            header('Location: '.$string);

        }else{
            return $string;
        }

    }



////////////////////////////////////////TRASH//////////////////
    public static function printRoute($value = 'index'){

        return self::$site_main_link . 'views/back/'.$value.'.php';
    }





}
$framework_route = new Route();