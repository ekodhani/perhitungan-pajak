        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title text-success">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> <?= $title; ?> </h3>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-glass card-img-holder text-white">
                  <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Total Pegawai <i class="mdi mdi-account-multiple-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?= $data_pegawai->num_rows(); ?></h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Contact Info <i class="mdi mdi-information-outline mdi-24px float-right"></i>
                    </h4>
                    <h4 class="mb-5"><i class="mdi mdi-phone"></i> +62 21 295 41 478</h4>
                    <h5 class="card-text"><i class="mdi mdi-email"></i> contact@buanamakmur.net</h5>
                  </div>
                </div>
              </div>
              <!-- <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">95,5741</h2>
                    <h6 class="card-text">Increased by 5%</h6>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
          <!-- content-wrapper ends -->