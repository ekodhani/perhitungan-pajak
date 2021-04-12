<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('vendor/'); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/'); ?>assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url('vendor/'); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/chat.css'); ?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url('assets/image/favicon.png'); ?>" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="<?= base_url('pegawai'); ?>"><img src="<?= base_url('assets/image/BMC.svg'); ?>" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="<?= base_url('pegawai'); ?>"><img src="<?= base_url('assets/image/favicon.png'); ?>" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="<?= base_url('assets/image/profile/') . $pegawai['gambar'];?>" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?= $pegawai['nama_pegawai']; ?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="<?= base_url('pegawai/settings'); ?>">
                  <i class="mdi mdi-settings mr-2 text-success"></i> Setting </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('login/logout'); ?>">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="<?= base_url('assets/image/profile/') .$pegawai['gambar'];?>" alt="profile">
                  <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?= $pegawai['nama_pegawai']; ?></span>
                </div>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Menu</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-menu menu-icon"></i>
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url('pegawai'); ?>"> Dashboard </a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url('pegawai/client'); ?>"> Data Client </a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url('pegawai/tax_calculate'); ?>"> Tax Calculation </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <div class="nav-link">
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-wieght-bold mb-2">Contacts</span>
                </div>
              </div>
            </li>
            <div class="border-bottom"></div>
            <?php foreach($user as $u) :?>
            <li class="nav-item nav-profile">
              <a class="nav-link" href="<?= base_url('chat?nip=') . $u->nip; ?>">
                <div class="nav-profile-image">
                  <img src="<?= base_url('assets/image/profile/') .$u->gambar;?>" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?= $u->nama_pegawai; ?></span>
                  <span class="text-danger text-small">Offline</span>
                </div>
                <div class="border-bottom"></div>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </nav>
        <!-- partial -->

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              <div class="row">
                <div class="col">
                  <div class="card">
                    <div class="card-header" style="background: #fff;">
                      <img src="<?= base_url('assets/image/profile/') . $user_active['gambar']; ?>" alt="profile" width="50" class="rounded-circle">
                      <span class="font-weight-bold p-2"><?= $user_active['nama_pegawai']; ?></span>
                    </div>
                    <div class="card-body" style="background: #f7f7f7;">
                      <div class="chat-box">
                        
                      </div>
                    </div>
                    <div class="card-footer" style="background: #fff;">
                      <form action="#" class="row mx-auto typing-area">
                        <div class="col-md-12 d-flex">
                          <input type="text" class="incoming_id" name="incoming_id" value="<?= $user_active['nip']; ?>" hidden>
                          <input type="text" class="form-control input-field" placeholder="Type a message here" name="pesan" autocomplete="off">
                          <button class="btn btn-gradient-primary kirim"><i class="mdi mdi-telegram"></i></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <!-- content-wrapper ends -->
          
        </div>
      <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('vendor/'); ?>assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url('vendor/'); ?>assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url('vendor/'); ?>assets/js/off-canvas.js"></script>
    <script src="<?= base_url('vendor/'); ?>assets/js/hoverable-collapse.js"></script>
    <script src="<?= base_url('vendor/'); ?>assets/js/misc.js"></script>
    <script src="<?= base_url('assets/js/chat.js'); ?>"></script>
    <!-- endinject -->
  </body>
</html>