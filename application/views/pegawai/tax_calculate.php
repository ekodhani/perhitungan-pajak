<?php 
function rupiah($angka){
    $hasil = "Rp. ". number_format($angka,2,',',',');
    return $hasil;
}
if (isset($_POST['hitung'])) {
    $nama = $this->input->post('nama');
    $statusnpwp = $this->input->post('statusnpwp');
    $statuskawin = $this->input->post('sk');
    $tanggungan = $this->input->post('tanggungan');
    $gaji = $this->input->post('gaji');
    $tunjanganlain = $this->input->post('tunjanganlain');
    $honor = $this->input->post('honor');
    $premi = $this->input->post('premiasuransi');
    $tantiem = $this->input->post('tantiem');
    $bruto = $gaji + $tunjanganlain + $honor + $premi + $tantiem;
    $biayajabatan = $bruto * 5/100;
    if ($biayajabatan >= 500000) {
        $biayajabatan = 500000;
    }
    $penghasilanbrutosetahun = ($gaji*12)+($tunjanganlain*12)+($honor*12)+($premi*12)+$tantiem;
    $biayajabatansetahun = $penghasilanbrutosetahun * 5/100;
    if($biayajabatansetahun >= 6000000){
        $biayajabatansetahun = 6000000;
    }
    $jumlahpengurang = $biayajabatansetahun;
    $neto =  $penghasilanbrutosetahun - $jumlahpengurang;

    // kondisi ptkp setahun
    if ( $this->input->post('sk') == "TK") {
        if ($this->input->post('tanggungan') == "0") {
            #code
            $ptkp = 54000000;
        } else if ($this->input->post('tanggungan') == "1") {
            $ptkp = 58500000;
        } else if ($this->input->post('tanggungan') == "2") {
            $ptkp = 63000000;
        } else if ($this->input->post('tanggungan') == "3") {
            $ptkp = 67500000;
        }
    } else if ( $this->input->post('sk') == "K") {
        if ($this->input->post('tanggungan') == "0") {
            #code
            $ptkp = 58500000;
        } else if ($this->input->post('tanggungan') == "1") {
            $ptkp = 63000000;
        } else if ($this->input->post('tanggungan') == "2") {
            $ptkp = 67500000;
        } else if ($this->input->post('tanggungan') == "3") {
            $ptkp = 72000000;
        }
    } else {
        $ptkp = "Null";
    }

    $pkpsetahun = $neto - $ptkp;

    $gajipertahun = $gaji*12;
    //tarif
    $pajak = 0;
    if ($pkpsetahun > 0) {
        if ($pkpsetahun > 500000000) {
            if ($statusnpwp == "NPWP") {
                $tier1 = 0.05 * 50000000;
                $tier2 = 0.15 * 200000000;
                $tier3 = 0.25 * 250000000;
                $tier4 = 0.3 * ($pkpsetahun - 500000000);
                $pajak = $tier1 + $tier2 + $tier3 + $tier4;
            } else if ($statusnpwp == "Non NPWP"){
                $tier1 = 0.05 * 1.2 * 50000000;
                $tier2 = 0.15 * 1.2 * 200000000;
                $tier3 = 0.25 * 1.2 * 250000000;
                $tier4 = 0.3 * 1.2 * ($pkpsetahun - 500000000);
                $pajak = $tier1 + $tier2 + $tier3 + $tier4;
            }
        } else if ($pkpsetahun > 250000000) {
            if ($statusnpwp == "NPWP") {
                $tier1 = 0.05 * 50000000;
                $tier2 = 0.15 * 200000000;
                $tier3 = 0.25 * ($pkpsetahun - 250000000);
                $pajak = $tier1 + $tier2 + $tier3;
            } else if ($statusnpwp == "Non NPWP") {
                $tier1 = 0.05 * 1.2 * 50000000;
                $tier2 = 0.15 * 1.2 * 200000000;
                $tier3 = 0.25 * 1.2 * ($pkpsetahun - 250000000);
                $pajak = $tier1 + $tier2 + $tier3;
            }
        } else if ($pkpsetahun > 50000000) {
            if ($statusnpwp == "NPWP") {
                $tier1 = 0.05 * 50000000;
                $tier2 = 0.15 * ($pkpsetahun - 50000000);
                $pajak = $tier1 + $tier2;
            } else if ($statusnpwp == "Non NPWP") {
                $tier1 = 0.05 * 1.2 * 50000000;
                $tier2 = 0.15 * 1.2 * ($pkpsetahun - 50000000);
                $pajak = $tier1 + $tier2;
            }
        } else {
            if ($statusnpwp == "NPWP") {
                $tier1 = 0.05 * $pkpsetahun;
                $pajak = $tier1;
            } else if ($statusnpwp == "Non NPWP") {
                $tier1 = 0.05 * 1.2 * $pkpsetahun;
                $pajak = $tier1;
            }
        }
    }
    $pphterutangsetahun = $pajak;
    $tunjanganpph = 0;
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-success">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-calculator"></i>
                </span> 
                <?= $title; ?> 
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

    <form action="" class="form-sample" method="post">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Personal</h4>
                        <p class="card-description">Data personal pegawai</p>
                        <div class="form-group">
                            <label for="nama">NIP</label>
                            <input type="text" class="form-control" value="<?= $pegawai_client['nip_pegawai_client']; ?>" name="nip" readonly>
                            <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" value="<?= $pegawai_client['nama_pegawai_client']; ?>" name="nama" readonly>
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="StatusNPWP">Status NPWP</label>
                            <input type="text" class="form-control" id="StatusNPWP" name="statusnpwp" value="<?= $pegawai_client['status_npwp']; ?>" readonly>
                            <?= form_error('statusnpwp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="StatusKawin">Status Kawin</label>
                            <input type="text" class="form-control" name="sk" value="<?= $pegawai_client['status_kawin']; ?>" id="StatusKawin" readonly>
                            <?= form_error('sk', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tanggungan">Tanggungan</label>
                            <input type="text" class="form-control" name="tanggungan" id="tanggungan" value="<?= $pegawai_client['tanggungan']?>" readonly>
                            <?= form_error('tanggungan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <d iv class="card">
                    <div class="card-body">
                        <h4 class="card-title">A.Penghasilan</h4>
                        <p class="card-description"> Penghasilan per-tahun </p>
                        <div class="form-group">
                            <label for="gaji">Gaji/Pensiun atau THT/JHT</label>
                            <input type="number" class="form-control" id="gaji" value="<?= $pegawai_client['gaji']; ?>" name="gaji" readonly>
                            <?= form_error('gaji', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tunjanganpph">Tunjangan PPh</label>
                            <input type="number" class="form-control" id="tunjanganpph" placeholder="0" name="tunjanganpph" readonly>
                            <?= form_error('tunjanganpph', '<small class="error">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tunjanganlain">Tunjangan Lainnya, Uang Lembur, dan sebagainya</label>
                            <input type="number" class="form-control" id="tunjanganlain" value="<?= $pegawai_client['tunjangan_lain'];?>" name="tunjanganlain" readonly>
                        </div>
                        <div class="form-group">
                            <label for="honor">Honorarium dan Imbalan Lainnya Sejenisnya</label>
                            <input type="number" class="form-control" id="honor" value="<?= $pegawai_client['honorarium'];?>" name="honor" readonly>
                        </div>
                        <div class="form-group">
                            <label for="premiasuransi">Premi Asuransi yang dibayar Pemberi Kerja</label>
                            <input type="number" class="form-control" id="premiasuransi" value="<?= $pegawai_client['premi_asuransi'];?>" name="premiasuransi" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tantiem">Tantiem, Bonus, Gratifikasi, Jasa Produksi dan THR</label>
                            <input type="number" class="form-control" id="tantiem" value="<?= $pegawai_client['bonus'];?>" name="tantiem" readonly>
                        </div>
                        <div class="form-group">
                            <label for="bruto">Penghasilan Bruto</label>
                            <?php if(isset($_POST['hitung'])){ ?>
                                <input type="text" class="form-control" id="bruto" value="<?= rupiah($bruto); ?>" name="bruto" readonly>
                                <?= form_error('bruto', '<small class="error">', '</small>'); ?>
                            <?php }else{ ?>
	                            <input type="text" value="0" class="form-control" id="bruto" name="bruto" readonly>
                            <?php } ?>
                        </div>
                    </div>
                </d>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">B.Pengurang</h4>
                        <p class="card-description">deskrispi</p>
                        <div class="form-group">
                            <label for="biayajabatan">Biaya Jabatan</label>
                            <?php if(isset($_POST['hitung'])){ ?>
                                <input type="text" class="form-control" id="biayajabatan" value="<?= rupiah($biayajabatan); ?>" name="biayajabatan" disabled>
                            <?php }else{ ?>
	                            <input type="text" value="0" class="form-control" id="biayajabatan" disabled>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">C.Penghitungan PPh Pasal 21</h4>
                        <p class="card-description"> C.Penghitungan PPh Pasal 21 </p>
                        <div class="form-group">
                            <label for="penghasilanbrutosetahun">Penghasilan Bruto Setahun</label>
                            <?php if(isset($_POST['hitung'])){ ?>
                                <input type="text" class="form-control" id="penghasilanbrutosetahun" value="<?= rupiah($penghasilanbrutosetahun); ?>" name="penghasilanbrutosetahun" disabled>
                            <?php }else{ ?>
                                <input type="text" value="0" class="form-control" id="penghasilanbrutosetahun" disabled>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="biayajabatansetahun">Biaya Jabatan Setahun</label>
                            <?php if(isset($_POST['hitung'])){ ?>
                            <input type="text" class="form-control" id="biayajabatansetahun" value="<?= rupiah($biayajabatansetahun); ?>" name="biayajabatansetahun" disabled>
                            <?php }else{ ?>
                                <input type="text" value="0" class="form-control" id="biayajabatansetahun" disabled>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="jumlahpengurangsetahun">Jumlah Pengurang Setahun</label>
                            <?php if(isset($_POST['hitung'])){ ?>
                                <input type="text" class="form-control" id="jumlahpengurangsetahun" value="<?= rupiah($jumlahpengurang); ?>" name="jumlahpengurangsetahun" disabled>
                            <?php }else{ ?>
                                <input type="text" value="0" class="form-control" id="jumlahpengurangsetahun" disabled>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="penghasilanneto">Penghasilan Neto</label>
                            <?php if(isset($_POST['hitung'])){ ?>
                                <input type="text" class="form-control" id="penghasilanneto" value="<?= rupiah($neto); ?>" name="penghasilanneto" disabled>
                            <?php }else{ ?>
                                <input type="text" value="0" class="form-control" id="penghasilanneto" disabled>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="penghasilantidakkenapajak">Penghasilan Tidak Kena Pajak</label>
                            <?php if(isset($_POST['hitung'])){ ?>
                                <input type="text" class="form-control" id="penghasilantidakkenapajak" value="<?= rupiah($ptkp); ?>" name="penghasilantidakkenapajak" disabled>
                            <?php }else{ ?>
                                <input type="text" value="0" class="form-control" id="penghasilantidakkenapajak" disabled>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="pkpsetahun">PKP Setahun/Disetahunkan</label>
                            <?php if(isset($_POST['hitung'])){ ?>
                                <input type="text" class="form-control" id="pkpsetahun" value="<?= rupiah($pkpsetahun); ?>" name="pkpsetahun" disabled>
                            <?php }else{ ?>
                                <input type="text" value="0" class="form-control" id="pkpsetahun" disabled>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="pphataspkp">PPh Pasal 21 atas PKP</label>
                            <?php if(isset($_POST['hitung'])){ ?>
                                <input type="text" class="form-control" id="pphataspkp" value="<?= rupiah($pajak); ?>" name="pphatas" disabled>
                            <?php }else{ ?>
                                <input type="text" value="0" class="form-control" id="pphatas" disabled>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="pphterutangsetahun">PPh Pasal 21 Terutang Setahun/Disetahunkan</label>
                            <?php if(isset($_POST['hitung'])){ ?>
                                <input type="text" class="form-control" id="pphterutangsetahun" value="<?= rupiah($pphterutangsetahun); ?>" name="pphterutangsetahun" disabled>
                            <?php }else{ ?>
                                <input type="text" value="0" class="form-control" id="pphterutangsetahun" disabled>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <button class="btn btn-success" name="simpan">Simpan</button>
            <button class="btn btn-info" name="hitung">Hitung</button>
            <button type="reset" class="btn btn-outline-secondary">Reset</button>
        </div>
    </form>
    </div>
</div>