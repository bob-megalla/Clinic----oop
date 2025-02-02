<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo
        <a href="index3.html" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="Logo" width="50px" height="50px" class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a> -->

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
      <div class="info text-center">

        <a href="?admin=dashboard" class="d-block text-light"><?= strtoupper($settings['site_name']) ?> <br>
          <?= strtoupper($_SESSION["email"]) ?> <br>
          <?= strtoupper($_SESSION["phone"]) ?>
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
        <!-- START DASHBOARD -->
        <li class="nav-item">
          <a href="<?= '?admin=dashboard' ?>" class="nav-link <?= activeAdminLink($active_id, 0); ?>">

            <i class="nav-icon fas fa-home"></i>
            <p>
              DASHBOARD
            </p>
          </a>
        </li>
        <!-- END DASHBOARD -->
        <!-- START DOCTORS -->
        <li class="nav-item">
          <a href="<?= '?admin=allDoctors' ?>" class="nav-link <?= activeAdminLink($active_id, 1); ?>">
          <i class="fa fa-user-md m-1"></i> 
            <p>
              DOCTORS
            </p>
          </a>
        </li>
        <!-- END DOCTORS -->
        <!-- START MESSAGES -->
        <li class="nav-item">
          <a href="<?= '?admin=allMessages' ?>" class="nav-link <?= activeAdminLink($active_id, 2); ?>">
          <i class="far fa-comments m-1"></i>
            <p>
              MESSAGES
            </p>
          </a>
        </li>
        <!-- END MESSAGES -->

        <!-- START MAJORS -->
        <li class="nav-item">
          <a href="<?= '?admin=allMajors' ?>" class="nav-link <?= activeAdminLink($active_id, 3); ?>">
          <i class="fa fa-stethoscope m-1"></i>
            <p>
              MAJORS
            </p>
          </a>
        </li>
        <!-- END MAJORS -->

        <!-- START USERS -->
        <li class="nav-item">
          <a href="<?= '?admin=allUsers' ?>" class="nav-link <?= activeAdminLink($active_id, 4); ?>">
          <i class="fas fa-users m-1"></i>
            <p>
              USERS
            </p>
          </a>
        </li>
        <!-- END USERS -->
        <!-- START SETTINGS -->
        <li class="nav-item">
          <a href="<?= '?admin=WebsiteSettings' ?>" class="nav-link <?= activeAdminLink($active_id, 5); ?>">
          <i class="fa fa-cogs m-1"></i>
            <p>
              SETTINGS
            </p>
          </a>
        </li>
        <!-- END CATEGORY -->

        <!-- START NEWS -->
        <li class="nav-item">
          <a href="<?= '?admin=allNews' ?>" class="nav-link <?= activeAdminLink($active_id, 6); ?>">
          <i class="fa fa-podcast m-1"></i>
            <p>
              NEWS
            </p>
          </a>
        </li>
        <!-- END NEWS -->

        <!-- START BOOKED -->
        <li class="nav-item">
          <a href="<?= '?admin=allBooked' ?>" class="nav-link <?= activeAdminLink($active_id, 7); ?>">
          <i class="fa fa-wheelchair m-1"></i>
            <p>
              BOOKED
            </p>
          </a>
        </li>
        <!-- END BOOKED -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>