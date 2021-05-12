<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
                <h3 class="page-title text-success">
                    <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-folder-account"></i>
                    </span> <?= $title; ?> </h3>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Client</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NPWP</th>
                                    <th>Nama Client</th>
                                    <th>Nomor Telpon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1;
                                foreach ($client as $klient) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $klient['nip']; ?></td>
                                    <td><?= $klient['nama_client']; ?></td>
                                    <td><?= $klient['no_telp']; ?></td>
                                    <td>
                                    <a href="<?= base_url('pegawai/detailRekap/') .$klient['id_client']; ?>" class="badge badge-gradient-info"><i class="mdi mdi-eye"></i> See Detail</a>
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