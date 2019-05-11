<?php

$framework_files_detection = '../../';

include_once( $framework_files_detection."app/controllers/initapp.php");

if( !$framework_alert::checkHtmlStops() ){


?>



<!DOCTYPE html>
<html lang="en">

<head>

  <?Php 
  
  
  include_once('partials/metatags.php');

  echo '<title>Welcome 2'.$framework_app::getSiteName().'</title>';

  include_once('partials/styles.php'); 
  
  
  
  ?>



</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?Php 

  include_once('partials/sidebar.php');


  ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?Php 

        include_once('partials/navbar.php');


        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Welcome to the Resto application</h1>
        <p>Her you can demande some plates to the costumers</p>
        <img class="img-fluid" src="../../public/images/front_img.png" alt="Resto">
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

        <?Php

        include_once('partials/footer.php');

        ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->




  <?Php
    include_once('partials/scrolltop.php');
    include_once('partials/logoutmodal.php');

    include_once('partials/scripts.php');

    ?>

</body>

</html>




<?php



}

