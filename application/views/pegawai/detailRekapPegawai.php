<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-success">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-folder-account"></i>
                </span>
                <?= $pegawai_client['nama']; ?>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcumb-item"><a href="<?= base_url('pegawai/detailRekap/') .$detail_client['id_client']; ?>">Back</a></li>
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

        <!-- main content -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p>NIP : <?= $pegawai_client['nip']; ?></p>
                        <p>Status NPWP : <?= $pegawai_client['status_npwp'];?></p>   
                        <p>Status Kawin : <?= $pegawai_client['status_kawin'];?></p>   
                        <p>Tanggungan : <?= $pegawai_client['tanggungan'];?></p>
                        <p>Gaji : <?= $pegawai_client['gaji']; ?></p>
                        <p>Tunjangan PPH : <?= $pegawai_client['tunjangan_pph']; ?></p>
                        <p>Tunjangan Lainnya, Uang Lembur, dan sebagainya : <?= $pegawai_client['tunjangan_lain']; ?></p>
                        <p>Honorarium dan Imbalan Lainnya Sejenisnya : <?= $pegawai_client['honor']; ?></p>
                        <p>Premi Asuransi yang dibayar Pemberi Kerja : <?= $pegawai_client['premi']; ?></p>
                        <p>Tantiem, Bonus, Gratifikasi, Jasa Produksi dan THR : <?= $pegawai_client['tantiem']; ?></p>
                        <p>Penghasilan Bruto : <?= $pegawai_client['bruto']; ?></p>
                        <p>Biaya Jabatan : <?= $pegawai_client['biaya_jabatan']; ?></p>
                        <p>Penghasilan Bruto Setahun : <?= $pegawai_client['biaya_jabatan_setahun']; ?></p>
                        <p>Jumlah Pengurang Setahun : <?= $pegawai_client['jumlah_pengurang_setahun']; ?></p>
                        <p>Penghasilan Neto : <?= $pegawai_client['penghasilan_neto']; ?></p>
                        <p>Penghasilan Tidak Kena Pajak : <?= $pegawai_client['ptkp']; ?></p>
                        <p>PKP Setahun : <?= $pegawai_client['pkp_setahun']; ?></p>
                        <p>PPH Atas PKP : <?= $pegawai_client['pph_atas_pkp']; ?></p>
                        <p>PPH Terutang Setahun : <?= $pegawai_client['pph_terutang_setahun']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>