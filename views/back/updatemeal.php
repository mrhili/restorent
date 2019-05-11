<?php

$framework_files_detection = '../../';

include_once( $framework_files_detection."app/controllers/initapp.php");

include_once( $framework_files_detection."app/controllers/initupdatemeal.php");





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
          <h1 class="h3 mb-4 text-gray-800">update a meal</h1>







        <form method="post" action="<?= $framework_route::from2('back', 'controllers', 'updatemeal').'?i='.$ordering->id ?>">
            
            
            <div class="row">

              <div class="col-xs-12">
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="costumer">Costumer</label>
                    <select name="costumer" class="form-control" id="costumer">
                      <?Php
                      foreach($costumers as $costumer){
                        ?>

                        <option <?= ($ordering->costumer_id == $costumer->id) ? 'selected': '' ?> value="<?= $costumer->id ?>"><?= $costumer->name ?></option>
                        <?Php
                      }

                      ?>


                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">

                    <a href="#" class="btn btn-primary pull-right">Or add a costumer</a>
                  </div>
                </div>
              
              </div>

                <div class="row">

                  <div class="col-xs-4">

                  <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Type</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?Php
                            foreach($types as $type){
                              ?>

                                <tr>
                                <td><input type="radio" name="type" <?= ($ordering->type_id == $type->id) ? 'checked': '' ?> value="<?= $type->id ?>"></td>

                                    <td><?= $type->name ?></td>
                                </tr>
                              <?Php
                            }

                            ?>

                            
                            </tbody>
                        </table>
                  </div>



                  <div class="col-xs-4">

                  <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Around the meal</th>

                            </tr>
                            </thead>
                            <tbody>


                            <?Php
                            foreach($arounds as $key =>$around){
                              ?>

                                <tr>
                                <td><input type="checkbox" name="arounds[]" <?= ($key == 'aroundkey_'.$around->id) ? 'checked': '' ?> value="<?= $around->id ?>"></td>

                                    <td><?= $around->name ?></td>
                                </tr>
                              <?Php
                            }

                            ?>

                            
                            </tbody>
                        </table>
                  </div>




                  <div class="col-xs-4">

                  <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Size</th>

                            </tr>
                            </thead>
                            <tbody>


                            <?Php
                            foreach($sizes as $size){
                              ?>

                                <tr>
                                <td><input  type="radio" name="size" <?= ($ordering->size_id == $size->id) ? 'checked': '' ?> value="<?= $size->id ?>"></td>

                                    <td><?= $size->name ?></td>
                                </tr>
                              <?Php
                            }

                            ?>


                            
                            </tbody>
                        </table>
                  </div>




                </div>




                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="note">Note</label>
                      <textarea name="note" class="form-control" id="note"><?= $ordering->note ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary pull-right">update the order</button>
                    </div>
                  </div>

                  </div>






              </div>


            </div>
        
        
        </form>












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

