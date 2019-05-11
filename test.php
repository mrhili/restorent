<?php


include_once( "app/controllers/initapp.php");



$ordering = $framework_ordering_model::getItWell( 2 ) ;
foreach($ordering->arounds as $key => $around){
    $framework_tools::debug( $key  );
    var_dump(array_key_exists( 'aroundkey_'.$around->id , $ordering->arounds ));
    var_dump( property_exists( $ordering->arounds, 'aroundkey_'.$around->id ) );
}

$framework_tools::debug( $ordering->arounds );




