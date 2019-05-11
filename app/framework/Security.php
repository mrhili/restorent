<?php
class Security extends Utilities{
    // if not logged send BACK
    public function __toString()
    {
        return 'Security';
    }

    public static function isChefOrMore(){
        $dicision = false;
        if( isset($_SESSION['role']) ){

            if( $_SESSION['role'] > 0 ){


                $dicision = !$dicision;


            }
            
        }


        return $dicision;
    }

    public static function isLogged(){
        $dicision = false;
        if( isset($_SESSION['logged']) ){

            if( $_SESSION['logged'] == true ){


                $dicision = !$dicision;


            }
            
        }


        return $dicision;
    }


    // if not logged send BACK
    public static function logFilter(){

        $redirectBack = True;
        if( isset($_SESSION['logged']) ){


            

            if($_SESSION['logged']){

                $redirectBack = false;

            }

            
        }

        if( $redirectBack ){

            self::back();

        }
    }

    //if not super admin send back
    public static function superAdminFilter(){
        $redirectBack = True;

        //if logged
        if( isset($_SESSION['logged'] ) ){

            if( $_SESSION['logged'] == true ){

                if( isset($_SESSION['role'] ) ){

                    if($_SESSION['role'] == 2){

                        $redirectBack = False;

                    }


                }

            }



        }




        //Final desicionecision
        if( $redirectBack ){
            self::back();
        }
    }

    public static function isOnlySuperAdmin(){
        $dicision = False;

        //if logged
        if( isset($_SESSION['logged'] ) ){

            if( $_SESSION['logged'] == true ){

                if( isset($_SESSION['role'] ) ){

                    if($_SESSION['role'] == 2){

                        $dicision = True;

                    }


                }

            }



        }

        return $dicision;

    }


    public static function isOnlyChef(){
        $dicision = False;

        //if logged
        if( isset($_SESSION['logged'] ) ){

            if( $_SESSION['logged'] == true ){

                if( isset($_SESSION['role'] ) ){

                    if($_SESSION['role'] == 1 ){

                        $dicision = True;

                    }


                }

            }



        }


        return $dicision;

    }


    public static function filter_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }




    
}
$framework_security = new Security();