<?php

$framework_files_detection = '../../';

include_once( $framework_files_detection."app/controllers/initapp.php");

include_once( $framework_files_detection."app/controllers/initshoworder.php");





if( !$framework_alert::checkHtmlStops() ){


?>



<!DOCTYPE html>
<html lang="en">

<head>

  <?Php 
  
  
  include_once('partials/metatags.php');

  echo '<title>'.$framework_app::getSiteName().' | My meals</title>';

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
          <h1 class="h3 mb-4 text-gray-800"><?=  'For costumer N° '.$ordering->costumer->id ?></h1>


          <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Order infos</h6>
                </div>
                <div class="card-body">
                  <p>Note : <?= $ordering->note ?>.</p>


                        <!---->
                  <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Size</th>
                        <th scope="col">Type</th>
                        <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td><?= $ordering->size->name ?></td>
                        <td><?= $ordering->type->name ?></td>
                        <td><?= $ordering->price ?></td>
                        </tr>
                        
                    </tbody>
                    </table>



                </div>
              </div>






              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Arounds infos</h6>
                </div>
                <div class="card-body">


                  <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Around Name</th>
                        <th scope="col">Around Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?Php
                        foreach( $ordering->arounds as $around ){

                            ?>
                        <tr>
                        <td><?= $around->name ?></td>
                        <td><?= $around->price ?></td>
                        </tr>
                        

                            <?Php

                        }
                        ?>

                    </tbody>
                    </table>



                </div>
              </div>








              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Costumer infos</h6>
                </div>
                <div class="card-body">


                  <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Costumer Name</th>
                        <th scope="col">Costumer Last name</th>
                        <th scope="col">Costumer Tel</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                        <td><?= $ordering->costumer->name ?></td>
                        <td><?= $ordering->costumer->last_name ?></td>
                        <td><?= $ordering->costumer->tel ?></td>
                        </tr>


                    </tbody>
                    </table>



                </div>
              </div>








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

