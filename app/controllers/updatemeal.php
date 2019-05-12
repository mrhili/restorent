<?php

$framework_files_detection = '../../';
include_once( "../../app/controllers/initapp.php");

$framework_security::logFilter();


if( empty( $_GET['i'] ) ){

    $framework_route::from2('views', 'views', $file='index', $redirect = true);

}
$ordering = $framework_ordering_model::getItWell($_GET['i']) ;


////$framework_tools::debug($ordering  );
////$framework_tools::debug('$ordering->arounds'  );
//$framework_tools::debug($ordering->arounds  );

if($framework_security::isOnlyChef() && $ordering->user_id != $_SESSION['id'] ){

    $framework_utilities::back();

}


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // The request is using the POST method
    $framework_utilities::back();
}

$price = 0.0;

$table_ordering = [];
$table_around_ordering = [];

$to_update = [];

$past_arounds = [];

$token_arounds = [];
$arounds = [];
$good = ['ordering' => False, 'around_ordering' => False];

$droped =[];

$modified = false;
$modified_around = false;


//$framework_tools::debug($_POST);


if(count($_POST) == 0) {
    $framework_utilities::back();
}


if( empty($_POST['note'] || $_POST['costumer'] || $_POST['type'] || $_POST['size'] )){

    $framework_utilities::back();
}

if( $_POST['note'] != $ordering->note ){

    $modified = true;
    $to_update['note'] = $framework_security::filter_input( $_POST['note'] );
    
}

$note = $_POST['note'];

//$framework_tools::debug('TO UPDATE IN NOTE');
//$framework_tools::debug($to_update);
//ihave problems her
//$framework_tools::debug('$ordering->costumer');
//$framework_tools::debug($_POST['costumer']);
//$framework_tools::debug($ordering->costumer_id);

if( $_POST['costumer'] != $ordering->costumer_id ){
    
    $modified = true;
    $to_update['costumer_id'] = $framework_security::filter_input( $_POST['costumer'] );
    
}
$costumer = $_POST['costumer'];





if( $_POST['type'] != $ordering->type_id ){
    
    $modified = true;
    $to_update['type_id'] = $framework_security::filter_input( $_POST['type'] );
    
}

$type = $_POST['type'];

//from id get the price
$price += floatval(  $framework_quick_query::first('types', $type, 'price')  );


if( empty( $_POST['arounds'] )){

    $_POST['arounds'] = [];
}


if( !is_array( $_POST['arounds'] ) ){

    $framework_utilities::back();

}


foreach($ordering->arounds as $key => $around){

    array_push($token_arounds, $around->id);


}
//$framework_tools::debug('TOKEN AROUND');
//$framework_tools::debug($ordering->arounds);
//$framework_tools::debug($token_arounds);

$arounds =  array_diff( $_POST['arounds'] , $token_arounds ) ;
//$framework_tools::debug('AROUNDs');
//$framework_tools::debug($arounds);

if(count( $arounds ) > 0){
    $modified_around = true;
}

$past_arounds = array_diff( $token_arounds, $_POST['arounds'] );
if(count( $past_arounds ) > 0){
    $modified_around = true;
}
//$framework_tools::debug('PAST AROUNDs');
//$framework_tools::debug($past_arounds);


foreach( $arounds as $around ){

    $price += floatval(  $framework_quick_query::first('arounds', $around, 'price')  );

}


if( $_POST['size'] != $ordering->size_id ){
    
    $modified = true;
    $to_update['size_id'] = $framework_security::filter_input( $_POST['size'] );
    
}



$size = $_POST['size'];


$price = floatval( $framework_math::pourcentage($price, $framework_quick_query::first('sizes', $size, 'taux') ) );


$price = $framework_money::limit( $price );


if($modified){
    $table_ordering = $framework_quick_query::update('orderings', $to_update, $ordering->id);
}


//$framework_tools::debug('TABLE ORDERING');
//$framework_tools::debug( $table_ordering );



if(is_array($table_ordering)){

    $good['ordering'] = True;

}




 
if( count($_POST['arounds']) != 0  ){




    foreach( $arounds as $around ){

        $table_around_ordering = $framework_quick_query::insert('around_ordering',[

            'ordering_id' => $ordering->id,
            'around_id' => $around
        ]);

        //$framework_tools::debug('TABLE AROUND ORDERING');
        //$framework_tools::debug( $table_around_ordering );

    }




    if(is_array($table_around_ordering)){

        $good['around_ordering'] = True;

    }



}else{
    $good['around_ordering'] = True;
}



foreach( $past_arounds as $ps ){
    $d = $framework_quick_query::dropBy('around_ordering', ['around_id' => $ps] );

    array_push($droped, $d);
}

//$framework_tools::debug('DROPED');
//$framework_tools::debug($droped);



////$framework_tools::debug( $table );




if( $good['around_ordering']  && $good['ordering']){


    //GO SEE THE ORDERING
    //$framework_tools::debug('I SHOULD GO');


    $framework_route::go('../../views/back/showmeal', $framework_route::parameterizer( ['i' => $table_ordering['row_id']   ])  );



}else{

    $framework_route::go('../../views/back/index'  );
}















