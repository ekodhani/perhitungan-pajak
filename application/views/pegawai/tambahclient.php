<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-success">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-account-plus"></i>
                </span>
                <?= $title; ?>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('pegawai/client'); ?>">Data Client</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                </ol>
            </nav>
        </div>

        <!-- main content -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mb-5 text-success">Form Tambah Data</div>

                        <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="npwp">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="nip" placeholder="Enter the client npwp">
                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama_client">Nama Client</label>
                                <input type="text" class="form-control" id="nama_client" name="nama_client" placeholder="Enter the client name">
                                <?= form_error('nama_client', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="5" class="form-control" placeholder="Enter the client address"></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">Nomor Telpon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Enter the client number phone">
                                <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Save</button>
                            <button type="reset" class="btn btn-outline-secondary"><i class="mdi mdi-autorenew"></i> Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main content -->
    </div>
</div>