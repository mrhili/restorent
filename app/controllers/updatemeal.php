<?php

$framework_files_detection = '../../';
include_once( "../../app/controllers/initapp.php");


$framework_security::logFilter();

if( empty( $_GET['i'] ) ){

    $framework_route::from2('views', 'views', $file='index', $redirect = true);

    

}


if( $framework_security::isOnlyChef() && $ordering->user_id != $_SESSION['id'] ){


    $framework_utilities::back();
}


$ordering = $framework_ordering_model::getItWell($_GET['i']) ;



if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // The request is using the POST method
    $framework_utilities::back();
}

if(count($_POST) == 0) {
    $framework_utilities::back();
}


$price = 0.0;

$table_ordering = [];
$table_around_ordering = [];

$to_update = [];

$good = ['ordering' => False, 'around_ordering' => False];






if( empty($_POST['note'] ) != $ordering->note ){

    $to_update = ['note' =>  $framework_security::filter_input( $_POST['note'] )   ];

}


if( empty($_POST['costumer'] ) != $ordering->note ){

    $to_update = ['costumer_id' =>  $framework_security::filter_input( $_POST['costumer'] )   ];

}




if( empty($_POST['type'] ) != $ordering->note ){

    $to_update = ['type_id' =>  $framework_security::filter_input( $_POST['type'] )   ];

}



//%


//from id get the price
$price += floatval(  $framework_quick_query::first('types', $type, 'price')  );


////////////////////////////////////////////AFTER



if( empty( $_POST['arounds'] )){
    $framework_utilities::back();
}


if( !is_array( $_POST['arounds'] ) ){

    $framework_utilities::back();

}

$arounds = [];

foreach($_POST['arounds'] as $k => $ar){

    $arounds[ $k ] = $framework_security::filter_input( $ar );

}



foreach( $arounds as $around ){

    $price += floatval(  $framework_quick_query::first('arounds', $around, 'price')  );

}


if( empty($_POST['size'] ) != $ordering->note ){

    $to_update = ['size_id' =>  $framework_security::filter_input( $_POST['size'] )   ];

}




$price = floatval( $framework_math::pourcentage($price, $framework_quick_query::first('sizes', $size, 'taux') ) );


$price = $framework_money::limit( $price );



$table_ordering = $framework_quick_query::update('orderings', $to_update);


if(is_array($table_ordering)){

    $good['ordering'] = True;

}


if( count($_POST['arounds']) == 0  ){




    foreach( $arounds as $around ){



$table_around_ordering = $framework_quick_query::insert('around_ordering',[

    'ordering_id' => $table_ordering['row_id'],
    'around_id' => $around
]);


}

if(is_array($table_around_ordering)){

$good['around_ordering'] = True;

}



}else{
    $good['around_ordering'] = True;
}



//$framework_tools::debug( $table );
    



if( $good['around_ordering']  && $good['ordering']){


    //GO SEE THE ORDERING

    $framework_route::go('../../views/back/showmeal', $framework_route::parameterizer( ['i' => $table_ordering['row_id']   ])  );



}


