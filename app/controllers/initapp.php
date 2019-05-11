<?Php


if(!isset($framework_files_detection)){
    $framework_files_detection = '';
};

//if all ready there is not  a session
if(!isset( $_SESSION['initialized'] )){

    //inti new session
    session_start();

    include_once($framework_files_detection.'app/framework/App.php');
    include_once($framework_files_detection.'app/framework/Conf.php');
    include_once($framework_files_detection.'app/framework/Tools.php');
    include_once($framework_files_detection.'app/framework/Utilities.php');
    include_once($framework_files_detection.'app/framework/Alert.php');
    include_once($framework_files_detection.'app/framework/Security.php');
    include_once($framework_files_detection.'app/framework/Math.php');
    include_once($framework_files_detection.'app/framework/Money.php');
    include_once($framework_files_detection.'app/framework/Route.php');

    include_once($framework_files_detection.'app/framework/initDB.php');
    include_once($framework_files_detection.'app/framework/quickQuery.php');

    include_once($framework_files_detection.'app/models/ordering/ordering.php');


    $_SESSION['initialized'] = True;




}




/*


    session_start();
    //echo $_SESSION['variables']['site_name'];
    
        include_once( "app/conf.php");
 
//FAMILY
    include_once( "app/tools.php");
        
        include_once( "app/utilities.php");
            include_once( "security/security.php");
            include_once( "app/alert.php");
            include_once( "app/math.php");
            include_once( "app/money.php");
            include_once( "app/route.php");
//ENDFAMILY
    /////////////DB
    
    $_SESSION['initialized'] = True;
}
                //child of alert
                include_once( "db/init.php");
                $conn = $init_db::init();
                    include_once( "db/quickquery.php");
///MODELS
        include_once( "db/models/ordering.php");
////

*/