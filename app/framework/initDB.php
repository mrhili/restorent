<?php

class InitDB extends Alert{
    public static function init(){

        self::stopHtml();


        try {



            $conn = new PDO("mysql:host=".self::$dbhost.";dbname=".self::$dbname, self::$dbuser, self::$dbpass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            self::startHtml();
            return $conn;
        
        
        }catch(PDOException $e) {
        
                echo self::write( $e->getMessage() );
        
                
        
        }
    }
}


$framework_init_db = new InitDB();