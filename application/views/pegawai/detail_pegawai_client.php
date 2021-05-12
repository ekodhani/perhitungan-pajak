<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-success">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-folder-account"></i>
                </span>
                <?= $pegawai_client['nama_pegawai_client']; ?>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcumb-item"><a href="<?= base_url('pegawai/detail_client/') .$detail_client['id_client']; ?>">Back</a></li>
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
                        <p>NIP : <?= $pegawai_client['nip_pegawai_client']; ?></p>
                        <p>Status NPWP : <?= $pegawai_client['status_npwp'];?></p>   
                        <p>Status Kawin : <?= $pegawai_client['status_kawin'];?></p>   
                        <p>Tanggungan : <?= $pegawai_client['tanggungan'];?></p>
                        <p>Gaji : <?= $pegawai_client['gaji']; ?></p>
                        <p>Tunjangan Lainnya, Uang Lembur, dan sebagainya : <?= $pegawai_client['tunjangan_lain']; ?></p>
                        <p>Honorarium dan Imbalan Lainnya Sejenisnya : <?= $pegawai_client['honorarium']; ?></p>
                        <p>Premi Asuransi yang dibayar Pemberi Kerja : <?= $pegawai_client['premi_asuransi']; ?></p>
                        <p>Tantiem, Bonus, Gratifikasi, Jasa Produksi dan THR : <?= $pegawai_client['bonus']; ?></p>
                        <p>Nomor Telpon : <?= $pegawai_client['no_telp_pegawai_client']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>