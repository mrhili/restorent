    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $framework_route::from2('back', 'back', 'index') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $framework_app::getSiteName()  ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?Php 
      
      if( $framework_security::isOnlySuperAdmin( ) ){

        ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= $framework_route::from2('back', 'back', 'dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <?Php 

      }

      ?>


      <?Php 
      
      if( $framework_security::isOnlyChef( ) ){

        ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= $framework_route::from2('back', 'back', 'mymeals') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>MyMeals</span></a>
        </li>

        <?Php 

      }

      ?>




      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->