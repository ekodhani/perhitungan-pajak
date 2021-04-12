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
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?= $pegawai['nama_pegawai']; ?></span>
                  <span class="text-secondary text-small"><?= $pegawai['jabatan']; ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('pegawai'); ?>">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('pegawai/client'); ?>">
                <span class="menu-title">Data Client</span>
                <i class="mdi mdi-folder-account menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('pegawai/tax_calculate'); ?>">
                <span class="menu-title">Tax Calculation</span>
                <i class="mdi mdi-calculator menu-icon"></i>
              </a>
            </li>
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom"></div>
                <a class="btn btn-block btn-lg btn-gradient-primary mt-4" href="<?= base_url('login/logout'); ?>">Logout</a>
              </span>
            </li>
          </ul>
        </nav>
        <!-- partial -->
