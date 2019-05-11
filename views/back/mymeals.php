<?php

$framework_files_detection = '../../';

include_once( $framework_files_detection."app/controllers/initapp.php");

include_once( $framework_files_detection."app/controllers/initmymeals.php");

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
          <h1 class="h3 mb-4 text-gray-800">My meals</h1>
        <p><a href="<?= $framework_route::from2('back', 'back', 'addmeal') ?>" class="btn btn-primary">Add a meal</a></p>









        <table class="table table-xs">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Costumer</th>
            <th scope="col">Type</th>
            <th scope="col">Size</th>
            <th scope="col">TOTAL Price</th>
            <th scope="col">Arounds</th>
            <th scope="col">Note</th>
            <th scope="col">Control</th>

            </tr>
        </thead>
        <tbody>

        <?Php
            foreach($orderings as $ordering){

        ?>
            <tr>
            <th scope="row"><?= $count ?></th>
            <td>
            <ul>
                <li><?= 'N° :'.$ordering->costumer->id ?></li>
                <li><?= 'Name :'.$ordering->costumer->name ?></li>
                <li><?= 'Last Name :'.$ordering->costumer->last_name ?></li>
                <li><?= 'Tel :'.$ordering->costumer->tel ?></li>
            </ul>
            </td>
            <td><?= $ordering->type->name ?></td>
            <td><?= $ordering->size->name ?></td>
            <td><?= $ordering->price ?> DH</td>
            <td>
                <ul>
                <?Php
                    foreach($ordering->arounds as $around){

                ?>
                <li><?= $around->name.' : '.$around->price ?> DH</li> 

                <?Php

                }
                ?>
                </ul>
            </td>

            <td><p><?= $ordering->note ?></p></td>

            <td>
            <ul>
            <li><a href="<?= $framework_route::from2('back', 'back', 'showmeal').'?i='.$around->id ?>" class="btn btn-primary btn-xs">Watch</a></li>
            <li><a href="<?= $framework_route::from2('back', 'back', 'updatemeal').'?i='.$around->id ?>" class="btn btn-success btn-xs">Update</a></li>

            
            </ul>
            </td>
            </tr>


            <?Php

            $count++;

            }
            ?>

        </tbody>
        </table>










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

