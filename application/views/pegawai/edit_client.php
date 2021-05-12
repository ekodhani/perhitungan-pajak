<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-success">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-settings"></i>
                </span> <?= $title; ?> </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('pegawai/client'); ?>">Back</a></li>
                </ol>
            </nav>
        </div>
        
        <!-- banner -->
        <?php if($this->session->flashdata('message')) {?>
            <div class="row" id="proBanner">
                <div class="col-12">
                    <span class="d-flex align-items-center purchase-popup">
                        <p class="text-success mr-auto"><?= $this->session->flashdata('message'); ?></p>
                        <i class="mdi mdi-close" id="bannerClose"></i>
                    </span>
                </div>
            </div>
        <?php } ?>
        <!-- end banner -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mb-5 text-success">Form Update</div>


                        
                        <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="npwp">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="npwp" value="<?= $detail_client['nip']; ?>">
                                <?= form_error('npwp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Client</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $detail_client['nama_client']; ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $detail_client['alamat']; ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="notelp" value="<?= $detail_client['no_telp']; ?>">
                                <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>