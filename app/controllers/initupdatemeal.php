<?Php
$token_arounds = [];


if( empty( $_GET['i'] ) ){

    $framework_route::from2('views', 'views', $file='index', $redirect = true);

    

}
$ordering = $framework_ordering_model::getItWell($_GET['i']) ;





if($framework_security::isOnlyChef() && $ordering->user_id != $_SESSION['id'] ){

    $framework_utilities::back();

}

$types = $framework_quick_query::rows('types');
$costumers = $framework_quick_query::rows('costumers');
$arounds = $framework_quick_query::rows('arounds');
$sizes = $framework_quick_query::rows('sizes');


foreach($ordering->arounds as $key => $around){

    array_push($token_arounds, $around->id);


}
