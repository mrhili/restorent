<?php


include_once( "app/controllers/initapp.php");



$ordering = $framework_ordering_model::getItWell( 2 ) ;
$ordering3 = $framework_ordering_model::getItWell( 4 ) ;


$token_arounds = [];

foreach($ordering->arounds as $key => $around){

    array_push($token_arounds, $around->id);


}

print_r( $token_arounds);

$token_arounds3 = [];

foreach($ordering3->arounds as $key => $around){

    array_push($token_arounds3, $around->id);


}

print_r( $token_arounds3);

//what the + in arround3
print_r( array_diff( $token_arounds3,$token_arounds ) );

/*
foreach($ordering->arounds as $key => $around){

    var_dump( property_exists( $ordering->arounds, $key ) );


}

*/
/*


foreach($ordering->arounds as $key => $around){
    $framework_tools::debug( $key  );
    var_dump(array_key_exists( 'aroundkey_'.$around->id , $ordering->arounds ));
    var_dump( property_exists( $ordering->arounds, 'aroundkey_'.$around->id ) );
}

$framework_tools::debug( $ordering->arounds );


*/

