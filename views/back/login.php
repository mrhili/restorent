<?php

$framework_files_detection = '../../';

include_once( $framework_files_detection."app/controllers/initapp.php");





// if logged back
if( $framework_security::isLogged( ) ){

    $framework_utilities::back();
}

if( !$framework_alert::checkHtmlStops() ){


?>



<!DOCTYPE html>
<html lang="en">

<head>

  <?Php 
  
  
  include_once('partials/metatags.php');

  echo '<title>SB Admin 2 - Blank</title>';

  include_once('partials/styles.php'); 
  
  
  
  ?>



</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="post" action="../../app/controllers/loginpost.php">
                    <div class="form-group">
                      <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input name="pass" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>

                    <button type="submit"  class="btn btn-primary btn-user btn-block">Login</button>

                    
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>



  <?Php


    include_once('partials/scripts.php');

    ?>

</body>

</html>




<?php



}

