<?php

$framework_files_detection = '../../';
include_once( "../../app/controllers/initapp.php");

if( $framework_security::isLogged( ) ){

    $framework_utilities::back();
}



if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // The request is using the POST method
    $framework_utilities::back();
}

if(count($_POST) == 0) {
    $framework_utilities::back();
}


$email = $_POST['email'];
$pass = md5($_POST['pass'] );


if($email == '' || $pass == ''){
    $framework_utilities::back();
}


//$table , $rows ='*', Array $columns
$user = $framework_quick_query::first_rowBy('users', ['email' => $email ]);

if( count($user) == 0 ){

    $framework_utilities::back();

}

$user = $user[0];


if( $pass != $user->pass ){

    $framework_utilities::back();

}

if( $user->role == 0 ){
    $framework_utilities::back();
}


$_SESSION['email'] = $user->email;
$_SESSION['name'] = $user->name;
$_SESSION['pass'] = $pass;
$_SESSION['id'] = $user->id;
$_SESSION['role'] = $user->role;
$_SESSION['logged'] = true;


if( $user->role == 1  ){
    //mymeals
    $framework_route::from2('controllers', 'back', 'mymeals', true);

}


if( $user->role == 2  ){
    //dashboard

    $framework_route::from2('controllers', 'back', 'dashboard', true);

}









//$framework_tools::debug( $user->pass );

//$framework_tools::debug(  );



            





