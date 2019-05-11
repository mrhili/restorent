<?php

$framework_files_detection = '../../';
include_once( "../../app/controllers/initapp.php");


if( $framework_security::isLogged( ) ){

    //echo 'logged';

    session_destroy();

}
//echo 'not';

$framework_route::from2('controllers', 'back', 'index', true);




