<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
                <h3 class="page-title text-success">
                    <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-calculator"></i>
                    </span> <?= $title; ?> </h3>
        </div>

    <form action="" class="form-sample" method="post">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Personal</h4>
                        <p class="card-description">deskripsi</p>
                        <div class="form-group">
                            <label for="exampleSelectStatusNPWP">Status NPWP</label>
                            <select class="form-control" id="exampleSelectStatusNPWP" name="statusnpwp">
                                <option value="npwp">NPWP</option>
                                <option value="nonnpwp">Non NPWP</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectStatusKawin">Status Kawin</label>
                            <select class="form-control" id="exampleSelectStatusKawin" name="statuskawin">
                                <option value="tk">TK</option>
                                <option value="k">K</option>
                                <option value="hb">HB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggungan">Tangungan</label>
                            <select class="form-control" id="Tanggungan" name="tanggungan">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Konfigurasi</h4>
                        <p class="card-description"> deskripsi </p>
                        <label class="">Tunjangan Pajak</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check form-check-success">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="tunjanganpajak" id="grossup" value="grossup" checked> Gross-Up </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check form-check-success">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="tunjanganpajak" id="nongrossup" value="nongrossup"> Non Gross-Up </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">A.Penghasilan</h4>
                        <p class="card-description"> deskripsi </p>
                        <div class="form-group">
                            <label for="gaji">Gaji/Pensiun atau THT/JHT</label>
                            <input type="number" class="form-control" id="gaji" placeholder="0" name="gaji">
                        </div>
                        <div class="form-group">
                            <label for="tunjanganpph">Tunjangan PPh</label>
                            <input type="number" class="form-control" id="tunjanganpph" placeholder="0" name="tunjanganpph" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tunjanganlain">Tunjangan Lainnya, Uang Lembur, dan sebagainya</label>
                            <input type="number" class="form-control" id="tunjanganlain" placeholder="0" name="tunjanganlain">
                        </div>
                        <div class="form-group">
                            <label for="honor">Honorarium dan Imbalan Lainnya Sejenisnya</label>
                            <input type="number" class="form-control" id="honor" placeholder="0" name="honor">
                        </div>
                        <div class="form-group">
                            <label for="premiasuransi">Premi Asuransi yang dibayar Pemberi Kerja</label>
                            <input type="number" class="form-control" id="premiasuransi" placeholder="0" name="premiasuransi">
                        </div>
                        <div class="form-group">
                            <label for="tantiem">Tantiem, Bonus, Gratifikasi, Jasa Produksi dan THR</label>
                            <input type="number" class="form-control" id="tantiem" placeholder="0" name="tantiem">
                        </div>
                        <div class="form-group">
                            <label for="bruto">Penghasilan Bruto</label>
                            <input type="number" class="form-control" id="bruto" placeholder="0" name="bruto" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">B.Pengurang</h4>
                        <p class="card-description">deskrispi</p>
                        <div class="form-group">
                            <label for="biayajabatan">Biaya Jabatan</label>
                            <input type="number" class="form-control" id="biayajabatan" placeholder="0" name="biayajabatan" disabled>
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
                            <input type="number" class="form-control" id="penghasilanbrutosetahun" placeholder="0" name="penghasilanbrutosetahun" disabled>
                        </div>
                        <div class="form-group">
                            <label for="biayajabatansetahun">Biaya Jabatan Setahun</label>
                            <input type="number" class="form-control" id="biayajabatansetahun" placeholder="0" name="biayajabatansetahun" disabled>
                        </div>
                        <div class="form-group">
                            <label for="jumlahpengurangsetahun">Jumlah Pengurang Setahun</label>
                            <input type="number" class="form-control" id="jumlahpengurangsetahun" placeholder="0" name="jumlahpengurangsetahun" disabled>
                        </div>
                        <div class="form-group">
                            <label for="penghasilanneto">Penghasilan Neto</label>
                            <input type="number" class="form-control" id="penghasilanneto" placeholder="0" name="penghasilanneto" disabled>
                        </div>
                        <div class="form-group">
                            <label for="penghasilantidakkenapajak">Penghasilan Tidak Kena Pajak</label>
                            <input type="number" class="form-control" id="penghasilantidakkenapajak" placeholder="0" name="penghasilantidakkenapajak" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pkpsetahun">PKP Setahun/Disetahunkan</label>
                            <input type="number" class="form-control" id="pkpsetahun" placeholder="0" name="pkpsetahun" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pphataspkp">PPh Pasal 21 atas PKP</label>
                            <input type="number" class="form-control" id="pphataspkp" placeholder="0" name="pphataspkp" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pphterutangsetahun">PPh Pasal 21 Terutang Setahun/Disetahunkan</label>
                            <input type="number" class="form-control" id="pphterutangsetahun" placeholder="0" name="pphterutangsetahun" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pphterutangbulanini">PPh Pasal 21 Terutang bulan ini</label>
                            <input type="number" class="form-control" id="pphterutangbulanini" placeholder="0" name="pphterutangbulanini" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <button type="submit" class="btn btn-info">Hitung</button>
            <button type="reset" class="btn btn-outline-secondary">Reset</button>
        </div>
    </form>
    </div>
</div>