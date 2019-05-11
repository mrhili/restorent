<?Php


if( empty( $_GET['i'] ) ){

    $framework_route::from2('views', 'views', $file='index', $redirect = true);

    

}

$ordering = $framework_ordering_model::getItWell($_GET['i']) ;


if( $framework_security::isOnlyChef() && $ordering->user_id != $_SESSION['id'] ){


    $framework_utilities::back();
}






