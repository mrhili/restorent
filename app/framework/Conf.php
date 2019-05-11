<?php
class Conf extends App {

    //أقل ما يمكن دفعه
    public static $limit_money = 50;
    public static $dbhost = 'localhost';
    public static $dbuser = 'root';
    public static $dbpass = '';
    public static $dbname = 'resto';
    public static $roles = ['normal', 'Chef', 'Super Admin'];

    public static function getRoles($value = null){

        if($value == null){

            return self::$roles;

        }else{
            return self::$roles[$value];
        }


        

    }
}




$framework_conf = new Conf();







