        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">




            




            <?Php 



            if($framework_security::isLogged( )){

                ?>

<div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['name']  ?></span>
                <img class="img-profile rounded-circle" src="../../public/images/profileholder.jpg">
              </a>
              <!-- Dropdown - User Information -->
              
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?Php 
                if( $framework_security::isChefOrMore( ) ){
                  ?>
                    <a class="dropdown-item" href="<?= $framework_route::from2('back', 'back', 'addmeal') ?>">
                      <i class="fas fa-drumstick-bite fa-sm fa-fw mr-2 text-gray-400"></i>
                      Compose order
                    </a>
                  <?Php
                }


                ?>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

                <?Php
                
            }else{

                ?>


                <li class="nav-item no-arrow mx-1">
                <a class="nav-link" href="<?= $framework_route::from2('back', 'back', 'login') ?>" >
                    <i class="fas fa-sign-in-alt fa-fw"></i>
                    Login
    
                </a>
                </li>
    

                <?Php



            }


            ?>



          </ul>

        </nav>
        <!-- End of Topbar -->