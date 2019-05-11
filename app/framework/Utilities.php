<?php
class Utilities extends Tools{
    
    public static function back($num = null){
        if($num == null){
            $num = 1;
            $previous = "javascript:history.go(-".$num.")";
            header('Location: ' . $previous );
        
            exit;
        }
    }
}
$framework_utilities = new Utilities();