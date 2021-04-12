<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-success">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-folder-account"></i>
                </span>
                <?= $detail_client['nama_client']; ?>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('pegawai/detail_client/') .$detail_client['id_client']; ?>">Back</a></li>
                </ol>
            </nav>
        </div>

        <!-- main content -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title"><?= $title . $detail_client['nama_client']; ?></div>
                        <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nip_pc">NIP</label>
                                <input type="text" class="form-control" id="nip_pc" name="nip_pc" placeholder="Enter the nip">
                                <?= form_error('nip_pc', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama_pc">Nama</label>
                                <input type="text" class="form-control" id="nama_pc" name="nama_pc" placeholder="Enter the name">
                                <?= form_error('nama_pc', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="gaji">Gaji</label>
                                <input type="text" name="gaji" id="gaji" class="form-control" placeholder="Enter the Sallary">
                                <?= form_error('gaji', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="no_telp_pc">Nomor Telpon</label>
                                <input type="text" class="form-control" id="no_telp_pc" name="no_telp_pc" placeholder="Enter the number phone">
                                <?= form_error('no_telp_pc', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Save</button>
                            <button type="reset" class="btn btn-outline-secondary"><i class="mdi mdi-autorenew"></i> Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content end -->
    </div>
</div>