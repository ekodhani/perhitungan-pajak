<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-success">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-settings"></i>
                </span> <?= $title; ?> </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('pegawai'); ?>">Back</a></li>
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
                                <label for="nama">Nama Pegawai</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $pegawai['nama_pegawai']; ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Foto Profile</label>
                                <div class="row">
                                    <div class="col-sm">
                                        <img src="<?= base_url('assets/image/profile/') . $pegawai['gambar']; ?>" width="70" alt="profile" class="rounded-circle">
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="file" name="gambar" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" name="gambar" disabled placeholder="Upload Image">
                                                <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Password">
                                <?= form_error('confirm_password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>