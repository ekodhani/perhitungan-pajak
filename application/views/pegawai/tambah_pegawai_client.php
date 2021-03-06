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
                                <input type="text" class="form-control" id="nip_pc" name="nip_pc" placeholder="Masukkan  NIP">
                                <?= form_error('nip_pc', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama_pc">Nama Pegawai</label>
                                <input type="text" class="form-control" id="nama_pc" name="nama_pc" placeholder="Masukkan Nama Pegawai">
                                <?= form_error('nama_pc', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="sn">Status NPWP</label>
                                <div class="row p-3">
                                    <div class="form-check form-check-danger col-2">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="sn" id="sn" value="NPWP"> NPWP </label>
                                    </div>
                                    <div class="form-check form-check-danger col">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="sn" id="sn" value="Non NPWP"> Non NPWP </label>
                                    </div>
                                </div>
                                <?= form_error('sn', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="sk">Status Kawin</label>
                                <div class="row p-3">
                                    <div class="form-check form-check-primary col-2">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="sk" id="sk" value="TK"> TK </label>
                                    </div>
                                    <div class="form-check form-check-primary col-2">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="sk" id="sk" value="K"> K </label>
                                    </div>
                                    <div class="form-check form-check-primary col">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="sk" id="sk" value="HB"> HB </label>
                                    </div>
                                </div>
                                <?= form_error('sk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tanggungan">Tanggungan</label>
                                <select class="form-control" id="tanggungan" name="tanggungan">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gaji">Gaji</label>
                                <input type="text" name="gaji" id="gaji" class="form-control" placeholder="Enter the Sallary">
                                <?= form_error('gaji', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tunjangan">Tunjangan Lainnya, Uang Lembur, dan Sebagainya</label>
                                <input type="text" name="tunjangan" id="tunjangan" class="form-control" placeholder="Masukkan Tunjangan Lainnya, Uang Lembur, dan Sebagainya">
                                <?= form_error('tunjangan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="honor">Honorarium dan Imbalan Lainnya Sejenisnya</label>
                                <input type="text" name="honor" id="honor" class="form-control" placeholder="Masukkan Honorarium dan Imbalan Lainnya Sejenisnya">
                                <?= form_error('honor', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="premi">Premi Asuransi yang dibayar Pemberi Kerja</label>
                                <input type="text" name="premi" id="premi" class="form-control" placeholder="Masukkan Premi Asuransi yang dibayar Pemberi Kerja">
                                <?= form_error('premi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tantiem">Tantiem, Bonus, Gratifikasi, Jasa Produksi dan THR</label>
                                <input type="text" name="tantiem" id="tantiem" class="form-control" placeholder="Masukkan Tantiem, Bonus, Gratifikasi, Jasa Produksi dan THR">
                                <?= form_error('tantiem', '<small class="text-danger pl-3">', '</small>'); ?>
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