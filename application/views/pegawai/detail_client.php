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
                    <li class="breadcrumb-item"><a href="<?= base_url('pegawai/client'); ?>">Data Client</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
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
                        <a href="<?= base_url('pegawai/tambahPegawaiClient/'). $detail_client['id_client']; ?>" class="btn btn-gradient-info mb-4"><i class="mdi mdi-account-plus"></i> Tambah Data Pegawai Client</a>
                        <h4 class="card-title">Daftar Pegawai Client</h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Client</th>
                                        <th>Nomor Telpon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no=1;
                                    foreach ($pegawai_client as $pc) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $pc->nip_pegawai_client; ?></td>
                                        <td><?= $pc->nama_pegawai_client; ?></td>
                                        <td><?= $pc->no_telp_pegawai_client; ?></td>
                                        <td>
                                            <a href="" class="badge badge-gradient-primary">
                                                <i class="mdi mdi-information-outline"></i> Detail
                                            </a>
                                            <a href="<?= base_url('pegawai/deletePegawaiClient/'. $pc->id_pegawai_client.'/'). $detail_client['id_client'] ; ?>" class="badge badge-gradient-danger">
                                                <i class="mdi mdi-delete"></i> Hapus
                                            </a>
                                            <a href="" class="badge badge-gradient-success">
                                                <i class="mdi mdi-tooltip-edit"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>