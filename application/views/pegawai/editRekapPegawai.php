<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-success">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-folder-account"></i>
                </span>
                <?= $pegawai_client['nama']; ?>
            </h3>
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

        <!-- main content -->
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" class="forms-sample">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" value="<?= $pegawai_client['nip']; ?>" name="nip" id="nip">
                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" value="<?= $pegawai_client['nama']; ?>" name="nama" id="nama">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                <input type="text" name="gaji" id="gaji" class="form-control" value="<?= $pegawai_client['gaji']; ?>">
                                <?= form_error('gaji', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tunjanganpph">Tunjangan PPh</label>
                                <input type="text" name="tunjanganpph" id="tunjanganpph" class="form-control" value="<?= $pegawai_client['tunjangan_pph']; ?>">
                                <?= form_error('tunjangan_pph', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tunjanganlain">Tunjangan Lainnya, Uang Lembur, dan Sebagainya</label>
                                <input type="text" name="tunjanganlain" id="tunjanganlain" class="form-control" value="<?= $pegawai_client['tunjangan_lain']; ?>">
                                <?= form_error('tunjanganlain', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="honor">Honorarium dan Imbalan Lainnya Sejenisnya</label>
                                <input type="text" name="honor" id="honor" class="form-control" value="<?= $pegawai_client['honor']; ?>">
                                <?= form_error('honor', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="premi">Premi Asuransi yang dibayar Pemberi Kerja</label>
                                <input type="text" name="premi" id="premi" class="form-control" value="<?= $pegawai_client['premi']; ?>">
                                <?= form_error('premi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tantiem">Tantiem, Bonus, Gratifikasi, Jasa Produksi dan THR</label>
                                <input type="text" name="tantiem" id="tantiem" class="form-control" value="<?= $pegawai_client['tantiem']; ?>">
                                <?= form_error('tantiem', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="bruto">Penghasilan Bruto</label>
                                <input type="text" name="bruto" id="bruto" class="form-control" value="<?= $pegawai_client['bruto']; ?>">
                                <?= form_error('bruto', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="biayajabatan">Biaya Jabatan</label>
                                <input type="text" name="biayajabatan" id="biayajabatan" class="form-control" value="<?= $pegawai_client['biaya_jabatan']; ?>">
                                <?= form_error('biayajabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="brutosetahun">Penghasilan Bruto Setahun</label>
                                <input type="text" name="brutosetahun" id="brutosetahun" class="form-control" value="<?= $pegawai_client['penghasilan_bruto_setahun']; ?>">
                                <?= form_error('brutosetahun', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="biayajabatansetahun">Biaya Jabatan Setahun</label>
                                <input type="text" name="biayajabatansetahun" id="biayajabatansetahun" class="form-control" value="<?= $pegawai_client['biaya_jabatan_setahun']; ?>">
                                <?= form_error('biayajabatansetahun', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="jumlahpengurangsetahun">Jumlah Pengurang Setahun</label>
                                <input type="text" name="jumlahpengurangsetahun" id="jumlahpengurangsetahun" class="form-control" value="<?= $pegawai_client['jumlah_pengurang_setahun']; ?>">
                                <?= form_error('jumlahpengurangsetahun', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="penghasilanneto">Penghasilan Neto</label>
                                <input type="text" name="penghasilanneto" id="penghasilanneto" class="form-control" value="<?= $pegawai_client['penghasilan_neto']; ?>">
                                <?= form_error('penghasilanneto', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="ptkp">Penghasilan Tidak Kena Pajak</label>
                                <input type="text" name="ptkp" id="ptkp" class="form-control" value="<?= $pegawai_client['ptkp']; ?>">
                                <?= form_error('ptkp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="pkpsetahun">PKP Setahun</label>
                                <input type="text" name="pkpsetahun" id="pkpsetahun" class="form-control" value="<?= $pegawai_client['pkp_setahun']; ?>">
                                <?= form_error('pkpsetahun', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="pphatas">PPH Atas PKP</label>
                                <input type="text" name="pphatas" id="pphatas" class="form-control" value="<?= $pegawai_client['pph_atas_pkp']; ?>">
                                <?= form_error('pphatas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="pphterutang">PPH Terutang Setahun</label>
                                <input type="text" name="pphterutang" id="pphterutang" class="form-control" value="<?= $pegawai_client['pph_terutang_setahun']; ?>">
                                <?= form_error('pphterutang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Edit</button>
                            <button type="reset" class="btn btn-outline-secondary"><i class="mdi mdi-autorenew"></i> Reset</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>