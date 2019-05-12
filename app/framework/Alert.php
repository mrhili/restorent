<?php
class Alert extends Utilities{

    public static function stopHtml(){

        $_SESSION['stop_html'] = True;

    }

    public static function startHtml(){

        unset($_SESSION['stop_html']);

    }

    public static function checkHtmlStops(){

        $dicision = false;

        if(isset($_SESSION['stop_html'])){


            if($_SESSION['stop_html']){

                $dicision = true;

            }

        }

        return $dicision;

    }

    public static function write($message){

        
        echo "<html><body>".$message."</body></html>";
    }
}

$framework_alert = new Alert();