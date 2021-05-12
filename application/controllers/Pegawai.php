<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Dashboard";
        // menampilkan data pegawai selain session yang sudah ter set
        $id = $this->session->nip;
        $data['user'] = $this->db->query("SELECT * FROM `pegawai` WHERE nip != '$id' ")->result();
        // menseleksi data pegawai berdasarkan nip yang telah ter set
        $data['pegawai'] = $this->M_PPH->select(['nip' => $this->session->userdata('nip')], 'pegawai')->row_array();
        // menangkap semua data pegawai
        $data['data_pegawai'] = $this->db->query('SELECT * FROM pegawai');
        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('tamplate/footer');
    }

    // function for calculating tax
    public function taxCalculate($id, $id_client)
    {
        if (isset($_POST['simpan']) == false) {
            $data['title'] = "Tax Calculation";
            // menampilkan data pegawai selain session yang sudah ter set
            $id_result = $this->session->nip;
            $data['user'] = $this->db->query("SELECT * FROM `pegawai` WHERE nip != '$id_result' ")->result();
            $data['pegawai'] = $this->M_PPH->select(['nip' =>$this->session->userdata('nip')], 'pegawai')->row_array();
            // Pegawai Client Query
            $data['pegawai_client'] = $this->M_PPH->select(['id_pegawai_client' => $id], 'pegawai_client')->row_array();
            $data['detail_client'] = $this->M_PPH->select(['id_client' => $id_client], 'pegawai_client')->row_array();
            $this->load->view('tamplate/header', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('pegawai/tax_calculate', $data);
            $this->load->view('tamplate/footer');
        } else {
            $nama = $this->input->post('nama');
            $statusnpwp = $this->input->post('statusnpwp');
            $statuskawin = $this->input->post('sk');
            $tanggungan = $this->input->post('tanggungan');
            $gaji = $this->input->post('gaji');
            $tunjanganpph = 0;
            $tunjanganlain = $this->input->post('tunjanganlain');
            $honor = $this->input->post('honor');
            $premi = $this->input->post('premiasuransi');
            $tantiem = $this->input->post('tantiem');
            $bruto = $gaji + $tunjanganlain + $honor + $premi + $tantiem;
            $biayajabatan = $bruto * 5/100;
            $penghasilanbrutosetahun = $bruto * 12;
            $biayajabatansetahun = $biayajabatan * 12;
            $jumlahpengurang = $biayajabatan * 12;
            $neto =  $penghasilanbrutosetahun - $jumlahpengurang;
            #blum di resultkan
            // $pphterutang = $pkpsetahun * $apaayo;
        
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
            // tarif
            if ($gajipertahun <= 50000000){
                if( $statusnpwp = "NPWP"){
                    $tarif =  5/100;
                    $pphatas = $pkpsetahun * $tarif;
                } else if ( $statusnpwp = "Non NPWP") {
                    $tarif = 5/100*1.2;
                    $pphatas = $pkpsetahun * $tarif;
                }
            } else if ($gajipertahun <= 250000000 || $gajipertahun == 50000001) {
                if( $statusnpwp = "NPWP"){
                    $tarif =  15/100;
                    $pphatas = $pkpsetahun * $tarif;
                } else if ( $statusnpwp = "Non NPWP") {
                    $tarif = 15/100*1.2;
                    $pphatas = $pkpsetahun * $tarif;
                }
            }  else if ($gajipertahun <= 500000000 || $gajipertahun == 250000001) {
                if( $statusnpwp = "NPWP"){
                    $tarif =  25/100;
                    $pphatas = $pkpsetahun * $tarif;
                } else if ( $statusnpwp = "Non NPWP") {
                    $tarif = 25/100*1.2;
                    $pphatas = $pkpsetahun * $tarif;
                }
            }  else if ($gajipertahun == 500000001) {
                if( $statusnpwp = "NPWP"){
                    $tarif =  30/100;
                    $pphatas = $pkpsetahun * $tarif;
                } else if ( $statusnpwp = "Non NPWP") {
                    $tarif = 30/100*1.2;
                    $pphatas = $pkpsetahun * $tarif;
                }
            }
            $pphterutangsetahun = $pphatas;
            $data = [
                'id_pegawai_client'         => $id,
                'nama'                      => $nama,
                'status_npwp'               => $statusnpwp,
                'status_kawin'              => $statuskawin,
                'tanggungan'                => $tanggungan,
                'gaji'                      => $gaji,
                'tunjangan_pph'             => $tunjanganpph,
                'tunjangan_lain'            => $tunjanganlain,
                'honor'                     => $honor,
                'premi'                     => $premi,
                'tantiem'                   => $tantiem,
                'bruto'                     => $bruto,
                'biaya_jabatan'             => $biayajabatan,
                'penghasilan_bruto_setahun' => $penghasilanbrutosetahun,
                'biaya_jabatan_setahun'     => $biayajabatansetahun,
                'jumlah_pengurang_setahun'  => $jumlahpengurang,
                'penghasilan_neto'          => $neto,
                'ptkp'                      => $ptkp,
                'pkp_setahun'               => $pkpsetahun,
                'pph_atas_pkp'              => $pphatas,
                'pph_terutang_setahun'      => $pphterutangsetahun,
                'id_client'                 => $id_client,
                'id_pegawai'                => $this->session->userdata('nip')
            ];
    
            $this->db->insert('rekap', $data);
            $this->session->set_flashdata('message', 'Data Berhasil Di Simpan, <a href="'.base_url('pegawai/rekap').'">Lihat Data</a>');
            redirect(base_url('pegawai/taxcalculate/'.$id.'/').$id_client);
            // var_dump($data);
            // die;
        }
    }

    // function to display client
    public function rekap()
    {
        $data['title'] = "Rekap Data";
        // menampilkan data pegawai selain session yang sudah ter set
        $id = $this->session->nip;
        $data['user'] = $this->db->query("SELECT * FROM `pegawai` WHERE nip != '$id' ")->result();
        // menseleksi data pegawai berdasarkan nip yang telah ter set
        $data['pegawai'] = $this->M_PPH->select(['nip' =>$this->session->userdata('nip')], 'pegawai')->row_array();
        // menampilkan data client berdasarkan id_pegawainya
        $data['client'] = $this->M_PPH->select(['id_pegawai' =>$this->session->userdata('nip')], 'client')->result_array();
        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('pegawai/rekap', $data);
        $this->load->view('tamplate/footer');
    }
    
    // function to display rekap data
    public function detailRekap($id)
    {
        $data['title'] = "Detail Rekap";
        $id_result = $this->session->nip;
        $data['user'] = $this->db->query("SELECT * FROM `pegawai` WHERE nip != '$id_result' ")->result();
        // menseleksi data pegawai berdasarkan nip yang telah ter set
        $data['pegawai'] = $this->M_PPH->select(['nip' =>$this->session->userdata('nip')], 'pegawai')->row_array();
        // menseleksi data client berdasarkan id client
        $data['detail_client'] = $this->M_PPH->select(['id_client' => $id], 'client')->row_array();
        // menampilkan data client berdasarkan id_pegawainya
        $data['rekap'] = $this->db->query("select * from rekap where id_client='$id'")->result();
        // var_dump($data);
        // die;
        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('pegawai/detail_rekap', $data);
        $this->load->view('tamplate/footer');
    }

    // function to display all client data
    public function client()
    {
        $data['title'] = "Data Client";
        // menampilkan data pegawai selain session yang sudah ter set
        $id = $this->session->nip;
        $data['user'] = $this->db->query("SELECT * FROM `pegawai` WHERE nip != '$id' ")->result();
        // menseleksi data pegawai berdasarkan nip yang telah ter set
        $data['pegawai'] = $this->M_PPH->select(['nip' =>$this->session->userdata('nip')], 'pegawai')->row_array();
        // menampilkan data client berdasarkan id_pegawainya
        $data['client'] = $this->M_PPH->select(['id_pegawai' =>$this->session->userdata('nip')], 'client')->result_array();
        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('pegawai/client', $data);
        $this->load->view('tamplate/footer');
    }

    // function to add a client
    public function tambahClient()
    {
        $this->form_validation->set_rules('nama_client', 'Nama Client', 'required', [
            'required' => 'Nama Harap di Isi'
        ]);
        $this->form_validation->set_rules('nip', 'NPWP', 'required|numeric',[
            'required' => 'NPWP Harap di Isi',
            'numeric' => 'NPWP harus berupa angka'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',[
            'required' => 'Alamat Harap di Isi'
        ]);
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|numeric',[
            'required' => 'Nomor Telepon Harap di Isi',
            'numeric' => 'Nomor Telepon Harus berupa angka'
        ]);
        if ($this->form_validation->run() == false) {
            // variabel title menampung string 
            $data['title'] = "Tambah Data Client";
            // menampilkan data pegawai selain session yang sudah ter set
            $id = $this->session->nip;
            $data['user'] = $this->db->query("SELECT * FROM `pegawai` WHERE nip != '$id' ")->result();
            // menseleksi data pegawai berdasarkan nip yang telah ter set
            $data['pegawai'] = $this->M_PPH->select(['nip' =>$this->session->userdata('nip')], 'pegawai')->row_array();
            $this->load->view('tamplate/header', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('pegawai/tambahclient', $data);
            $this->load->view('tamplate/footer');
        } else {
            #code
            $npwp = $this->input->post('nip');
            $nama_client = $this->input->post('nama_client');
            $alamat = $this->input->post('alamat');
            $no_telp = $this->input->post('no_telp');

            $data = [
                'nip' => $npwp,
                'nama_client' => $nama_client,
                'alamat' => $alamat,
                'no_telp' => $no_telp,
                'id_pegawai' => $this->session->userdata('nip')
            ];

            $this->db->insert('client', $data);
            
            $this->session->set_flashdata('message', 'Data Berhasil Di Tambah');
            redirect('pegawai/client');
        }
    }

    // function to delete client 
    public function deleteClient($id)
    {
        #code
        $tables = ['client', 'pegawai_client'];
        $this->db->where('id_client', $id);
        $this->db->delete($tables);
        $this->session->set_flashdata('message', 'Data Client Terhapus');
        redirect(base_url('pegawai/client'));
    }

    // function to update data client
    public function edit_client($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama Harap di Isi'
        ]);
        $this->form_validation->set_rules('npwp', 'NPWP', 'required|numeric',[
            'required' => 'NPWP Harap di Isi',
            'numeric' => 'NPWP harus berupa angka'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',[
            'required' => 'Alamat Harap di Isi'
        ]);
        $this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required|numeric',[
            'required' => 'Nomor Telepon Harap di Isi',
            'numeric' => 'Nomor Telepon Harus berupa angka'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Client";
            // menampilkan data pegawai selain session yang sudah ter set
            $id_result = $this->session->nip;
            $data['user'] = $this->db->query("SELECT * FROM `pegawai` WHERE nip != '$id_result' ")->result();
            // menseleksi data pegawai berdasarkan nip yang telah ter set
            $data['pegawai'] = $this->M_PPH->select(['nip' =>$this->session->userdata('nip')], 'pegawai')->row_array();
            // menseleksi data client berdasarkan id client
            $data['detail_client'] = $this->M_PPH->select(['id_client' => $id], 'client')->row_array();
            $this->load->view('tamplate/header', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('pegawai/edit_client', $data);
            $this->load->view('tamplate/footer');
        } else {
            #statement
            $nama = $this->input->post('nama');
            $npwp = $this->input->post('npwp');
            $alamat = $this->input->post('alamat');
            $notelp = $this->input->post('notelp');
            
            $this->db->set('nama_client', $nama);
            $this->db->set('alamat', $alamat);
            $this->db->set('no_telp', $notelp);
            $this->db->set('nip', $npwp);
            $this->db->where('id_client', $id);
            $this->db->update('client');

            $this->session->set_flashdata('message', 'Data Client Berhasil Di Update');
            redirect('pegawai/client');
        }
    }

    // function to see detail client employee data
    public function detail_client($id)
    {
        $data['title'] = "Detail Client";
        // menampilkan data pegawai selain session yang sudah ter set
        $id_result = $this->session->nip;
        $data['user'] = $this->db->query("SELECT * FROM `pegawai` WHERE nip != '$id_result' ")->result();
        // menseleksi data pegawai berdasarkan nip yang telah ter set
        $data['pegawai'] = $this->M_PPH->select(['nip' =>$this->session->userdata('nip')], 'pegawai')->row_array();
        // menseleksi data client berdasarkan id client
        $data['detail_client'] = $this->M_PPH->select(['id_client' => $id], 'client')->row_array();
        // menseleksi semua data pegawai client dan berdasrkan id clientnya
        $data['pegawai_client'] = $this->db->query("select * from pegawai_client, client where pegawai_client.id_client=client.id_client and client.id_client='$id'")->result();
        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('pegawai/detail_client', $data);
        $this->load->view('tamplate/footer');
    }

    // function to add employee data
    public function tambahPegawaiClient($id)
    {
        $this->form_validation->set_rules('nama_pc', 'Nama', 'required', [
            'required' => 'Nama Harap di Isi'
        ]);
        $this->form_validation->set_rules('nip_pc', 'NIP', 'required|numeric',[
            'required' => 'Nip Harap di Isi',
            'numeric' => 'NIP harus berupa angka'
        ]);
        $this->form_validation->set_rules('gaji', 'Gaji', 'required|numeric',[
            'required' => 'Alamat Harap di Isi'
        ]);
        $this->form_validation->set_rules('no_telp_pc', 'Nomor Telepon', 'required|numeric',[
            'required' => 'Nomor Telepon Harap di Isi',
            'numeric' => 'Nomor Telepon Harus berupa angka'
        ]);
        if ($this->form_validation->run() == false) {
            // variabel title menampung string 
            $data['title'] = "Tambah Data Pegawai ";
            // menampilkan data pegawai selain session yang sudah ter set
            $id_result = $this->session->nip;
            $data['user'] = $this->db->query("SELECT * FROM `pegawai` WHERE nip != '$id_result' ")->result();
            // menseleksi data pegawai berdasarkan nip yang telah ter set
            $data['pegawai'] = $this->M_PPH->select(['nip' =>$this->session->userdata('nip')], 'pegawai')->row_array();
            // menseleksi data client berdasarkan id client
            $data['detail_client'] = $this->M_PPH->select(['id_client' => $id], 'client')->row_array();
            $this->load->view('tamplate/header', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('pegawai/tambah_pegawai_client', $data);
            $this->load->view('tamplate/footer');
        } else {
            $nip_pc = $this->input->post('nip_pc');
            $nama_pc = $this->input->post('nama_pc');
            $statusnpwp = $this->input->post('sn');
            $statuskawin = $this->input->post('sk');
            $tanggungan =  $this->input->post('tanggungan');
            $gaji = $this->input->post('gaji');
            $tunjanganlain = $this->input->post('tunjangan');
            $honor = $this->input->post('honor');
            $premi = $this->input->post('premi');
            $bonus = $this->input->post('tantiem');
            $no_telp_pc = $this->input->post('no_telp_pc');

            $data = [
                'nip_pegawai_client' => $nip_pc,
                'nama_pegawai_client' => $nama_pc,
                'status_npwp' => $statusnpwp,
                'status_kawin' => $statuskawin,
                'tanggungan' => $tanggungan,
                'gaji' => $gaji,
                'tunjangan_lain' => $tunjanganlain,
                'honorarium' => $honor,
                'premi_asuransi' => $premi,
                'bonus' => $bonus,
                'no_telp_pegawai_client' => $no_telp_pc,
                'id_client' => $id
            ];

            $this->db->insert('pegawai_client', $data);
            
            $this->session->set_flashdata('message', 'Data Berhasil Di Tambah');
            redirect('pegawai/detail_client/'.$id);
        }
    }

    // function to detail pegawai client
    public function detailPegawaiClient($id, $id_client)
    {
        $data['title'] = "Detail Pegawai";
        // User Query
        $id_result = $this->session->nip;
        $data['user'] = $this->db->query("SELECT * FROM `pegawai` WHERE nip != '$id_result' ")->result();
        $data['pegawai'] = $this->M_PPH->select(['nip' =>$this->session->userdata('nip')], 'pegawai')->row_array();
        // Pegawai Client Query
        $data['pegawai_client'] = $this->M_PPH->select(['id_pegawai_client' => $id], 'pegawai_client')->row_array();
        $data['detail_client'] = $this->M_PPH->select(['id_client' => $id_client], 'pegawai_client')->row_array();
        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('pegawai/detail_pegawai_client', $data);
        $this->load->view('tamplate/footer');
    }

    // function to update data pegawai client
    public function editPegawaiClient($id, $id_client)
    {
        #code
        $this->form_validation->set_rules('nip','NIP','required|numeric',[
            'required' => 'Nip Harus Di Isi!',
            'numeric' => 'Nip Harus Berupa Angka'
        ]);
        $this->form_validation->set_rules('nama','Nama','required',[
            'required' => 'Nama Harus Di Isi!'
        ]);
        $this->form_validation->set_rules('sn','Status NPWP','required',[
            'required' => 'Status NPWP Harus Di Isi!'
        ]);
        $this->form_validation->set_rules('sk','Status Kawin','required',[
            'required' => 'Status Kawin Harus Di Isi!'
        ]);
        $this->form_validation->set_rules('gaji','Gaji','required|numeric',[
            'required' => 'Gaji Harus Di Isi!',
            'numeric' => 'Gaji Harus Berupa Angka'
        ]);
        $this->form_validation->set_rules('no_telp_pc','Nomor Telepon','required|numeric',[
            'required' => 'Nomor Telepon Harus Di Isi',
            'numeric' => 'Nomor Telepon Harus Berupa Angka!'
        ]);

        if ($this->form_validation->run() == false){
            $data['title'] = "Update Data Pegawai";
            // User Query
            $id_result = $this->session->nip;
            $data['user'] = $this->db->query("SELECT * FROM `pegawai` WHERE nip != '$id_result' ")->result();
            $data['pegawai'] = $this->M_PPH->select(['nip' =>$this->session->userdata('nip')], 'pegawai')->row_array();
            // Pegawai Client Query
            $data['pegawai_client'] = $this->M_PPH->select(['id_pegawai_client' => $id], 'pegawai_client')->row_array();
            $data['detail_client'] = $this->M_PPH->select(['id_client' => $id_client], 'pegawai_client')->row_array();
            $this->load->view('tamplate/header', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('pegawai/edit_pegawai_client', $data);
            $this->load->view('tamplate/footer');
        } else {
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $sn = $this->input->post('sn');
            $sk = $this->input->post('sk');
            $tanggungan = $this->input->post('tanggungan');
            $tunjangan = $this->input->post('tunjangan');
            $gaji = $this->input->post('gaji');
            $honor = $this->input->post('honor');
            $premi = $this->input->post('premi');
            $tantiem = $this->input->post('tantiem');
            $no_telp = $this->input->post('no_telp_pc');
            
            $this->db->set('nip_pegawai_client', $nip);
            $this->db->set('nama_pegawai_client', $nama);
            $this->db->set('status_npwp', $sn);
            $this->db->set('status_kawin', $sk);
            $this->db->set('tanggungan', $tanggungan);
            $this->db->set('gaji', $gaji);
            $this->db->set('tunjangan_lain', $tunjangan);
            $this->db->set('honorarium', $honor);
            $this->db->set('premi_asuransi', $premi);
            $this->db->set('bonus', $tantiem);
            $this->db->set('no_telp_pegawai_client', $no_telp);
            $this->db->set('id_client', $id_client);
            $this->db->where('id_pegawai_client', $id);
            $this->db->update('pegawai_client');

            $this->session->set_flashdata('message', 'Data Pegawai Client Berhasil Di Update');
            redirect('pegawai/detail_client/'.$id_client);
        }
    }

    // function to delete data pegawai client
    public function deletePegawaiClient($id, $id_client)
    {
        #code
        // menseleksi data client berdasarkan id client
        $data['detail_client'] = $this->M_PPH->select(['id_client' => $id_client], 'pegawai_client')->row_array();
        $this->db->where('id_pegawai_client', $id);
        $this->db->delete('pegawai_client');
        $this->session->set_flashdata('message', 'Data Pegawai Client Terhapus');
        redirect(base_url('pegawai/detail_client/' .$id_client));
    }


    // function to update user data
    public function settings()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'tidak terisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required',[
            'required' => 'Password Harap di Isi'
        ]);
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]',[
            'required' => 'Confirm Password Harap di Isi',
            'matches' => 'Password tidak Cocok'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Setting";
            // menampilkan data pegawai selain session yang sudah ter set
            $id = $this->session->nip;
            $data['user'] = $this->db->query("SELECT * FROM `pegawai` WHERE nip != '$id' ")->result();
            // menseleksi data pegawai berdasarkan nip yang telah ter set
            $data['pegawai'] = $this->M_PPH->select(['nip' =>$this->session->userdata('nip')], 'pegawai')->row_array();
            $this->load->view('tamplate/header', $data);
            $this->load->view('tamplate/sidebar', $data);
            $this->load->view('pegawai/setting', $data);
            $this->load->view('tamplate/footer');
        } else {
            # code...
            $nama = $this->input->post('nama');
            $password = $this->input->post('password');
            $nip = $this->session->userdata('nip');

            // Apakah ada gambar ?
            $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/image/profile/';
                $config['file_name']     = 'profile';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('password', md5($password));
            $this->db->set('nama_pegawai', $nama);
            $this->db->where('nip', $nip);
            $this->db->update('pegawai');

            $this->session->set_flashdata('message', 'Profile Berhasil Di Update');
            redirect('pegawai/settings');
        }
    }

    // function to export calculate tax to xlsx
    public function exportTax()
    {
        //code use third party phpexcel-1.8 blom di border style
        require(APPPATH. 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $spreadsheet = new PHPExcel();

        $spreadsheet->getProperties()->setCreator("CV. Buana Makmur Consulting");
        $spreadsheet->getProperties()->setLastModifiedBy("CV. Buana Makmur Consulting");
        $spreadsheet->getProperties()->setTitle("Data Client");

        $spreadsheet->setActiveSheetIndex(0);

        $sheet = $spreadsheet->getActiveSheet();

        // set width
        $sheet->getColumnDimension('A')->setWidth(10);
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(30);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getColumnDimension('F')->setWidth(30);
        $sheet->getColumnDimension('G')->setWidth(30);
        $sheet->getColumnDimension('H')->setWidth(30);
        $sheet->getColumnDimension('I')->setWidth(30);
        $sheet->getColumnDimension('J')->setWidth(30);
        $sheet->getColumnDimension('K')->setWidth(30);
        $sheet->getColumnDimension('L')->setWidth(30);
        $sheet->getColumnDimension('M')->setWidth(30);
        $sheet->getColumnDimension('N')->setWidth(30);
        $sheet->getColumnDimension('O')->setWidth(30);
        $sheet->getColumnDimension('P')->setWidth(30);
        $sheet->getColumnDimension('Q')->setWidth(30);
        $sheet->getColumnDimension('R')->setWidth(30);
        $sheet->getColumnDimension('S')->setWidth(30);
        $sheet->getColumnDimension('T')->setWidth(30);
        $sheet->getColumnDimension('U')->setWidth(30);
        $sheet->getColumnDimension('V')->setWidth(30);

        // set cell value
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NPWP');
        $sheet->setCellValue('C1', 'Nama Pegawai Client');
        $sheet->setCellValue('D1', 'Status NPWP');
        $sheet->setCellValue('E1', 'Status Kawin');
        $sheet->setCellValue('F1', 'Tanggungan');
        $sheet->setCellValue('G1', 'Gaji');
        $sheet->setCellValue('H1', 'Tunjangan PPh');
        $sheet->setCellValue('I1', 'Tunjangan Lainnya');
        $sheet->setCellValue('J1', 'Honorarium');
        $sheet->setCellValue('K1', 'Premi Asuransi');
        $sheet->setCellValue('L1', 'THR');
        $sheet->setCellValue('M1', 'Penghasilan Bruto');
        $sheet->setCellValue('N1', 'Biaya Jabatan');
        $sheet->setCellValue('O1', 'Penghasilan Bruto Setahun');
        $sheet->setCellValue('P1', 'Biaya Jabatan Setahun');
        $sheet->setCellValue('Q1', 'Jumlah Pengurang Setahun');
        $sheet->setCellValue('R1', 'Penghasilan Neto');
        $sheet->setCellValue('S1', 'PTKP');
        $sheet->setCellValue('T1', 'PKP Setahun');
        $sheet->setCellValue('U1', 'PPh Pasal 21 Atas PKP');
        $sheet->setCellValue('V1', 'PPh Pasal 21 Terutang Setahun');
        
        // give border header data
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'borders' => [
                'allborders' => [
                    'style' => PHPExcel_Style_Border::BORDER_THICK
                ]
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
            ]
        ];
        $sheet->getStyle('A1:V1')->applyFromArray($styleArray);

        // BLANK BANGET ANJIRRR
        $client = $this->M_PPH->select(['id_pegawai' =>$this->session->userdata('nip')], 'client')->result();
        $no = 1;
        $baris = 2;
        foreach($client as $row){
            $sheet->setCellValue('A'.$baris, $no++);
            $sheet->setCellValue('B'.$baris, $row->nip);
            $sheet->setCellValue('C'.$baris, $row->nama_client);
            $sheet->setCellValue('D'.$baris, $row->alamat);
            $sheet->setCellValue('E'.$baris, $row->no_telp);

            $baris++;
        }
        // BLANK BANGET ANJIRRR

        // give border data
        $styleArrayData = [
            'borders' => [
                'allborders' => [
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                ]
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
            ]
        ];
        $sheet->getStyle('A2:V'.($baris-1))->applyFromArray($styleArrayData);

        $filename = "Data Tax Pegawai Client".'.xlsx';
        $sheet->setTitle("Data Pajak");

        header('Content-Type: Application/vnd.opensmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($spreadsheet, 'Excel2007');
        $writer->save('php://output');

        exit;
        //End code use third party phpexcel-1.8
    }


    // function to export client data to xlsx
    public function exportClient()
    {        
        //code use third party phpexcel-1.8 blom di border style
        require(APPPATH. 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $spreadsheet = new PHPExcel();

        $spreadsheet->getProperties()->setCreator("CV. Buana Makmur Consulting");
        $spreadsheet->getProperties()->setLastModifiedBy("CV. Buana Makmur Consulting");
        $spreadsheet->getProperties()->setTitle("Data Client");

        $spreadsheet->setActiveSheetIndex(0);

        $sheet = $spreadsheet->getActiveSheet();

        // set width
        $sheet->getColumnDimension('A')->setWidth(10);
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(30);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(30);

        // set cell value
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NPWP');
        $sheet->setCellValue('C1', 'Nama Client');
        $sheet->setCellValue('D1', 'Alamat');
        $sheet->setCellValue('E1', 'No Telp');

        // give border header data
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'borders' => [
                'allborders' => [
                    'style' => PHPExcel_Style_Border::BORDER_THICK
                ]
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
            ]
        ];
        $sheet->getStyle('A1:E1')->applyFromArray($styleArray);

        $client = $this->M_PPH->select(['id_pegawai' =>$this->session->userdata('nip')], 'client')->result();
        $no = 1;
        $baris = 2;
        foreach($client as $row){
            $sheet->setCellValue('A'.$baris, $no++);
            $sheet->setCellValue('B'.$baris, $row->nip);
            $sheet->setCellValue('C'.$baris, $row->nama_client);
            $sheet->setCellValue('D'.$baris, $row->alamat);
            $sheet->setCellValue('E'.$baris, $row->no_telp);

            $baris++;
        }

        // give border data
        $styleArrayData = [
            'borders' => [
                'allborders' => [
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                ]
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
            ]
        ];
        $sheet->getStyle('A2:E'.($baris-1))->applyFromArray($styleArrayData);

        $filename = "Data Client".'.xlsx';
        $sheet->setTitle("Data Client");

        header('Content-Type: Application/vnd.opensmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($spreadsheet, 'Excel2007');
        $writer->save('php://output');

        exit;
        //End code use third party phpexcel-1.8
    }

    // function to export client employee data to xlsx
    public function exportPegawaiClient($id)
    {
        //code use third party phpexcel-1.8 blom di border style
        require(APPPATH. 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $spreadsheet = new PHPExcel();

        $spreadsheet->getProperties()->setCreator("CV. Buana Makmur Consulting");
        $spreadsheet->getProperties()->setLastModifiedBy("CV. Buana Makmur Consulting");
        $spreadsheet->getProperties()->setTitle("Data Pegawai Client");

        $spreadsheet->setActiveSheetIndex(0);

        $sheet = $spreadsheet->getActiveSheet();

        // set width
        $sheet->getColumnDimension('A')->setWidth(6);
        $sheet->getColumnDimension('B')->setWidth(23);
        $sheet->getColumnDimension('C')->setWidth(15);
        $sheet->getColumnDimension('D')->setWidth(15);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(15);
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->getColumnDimension('H')->setWidth(47);
        $sheet->getColumnDimension('I')->setWidth(45);
        $sheet->getColumnDimension('J')->setWidth(45);
        $sheet->getColumnDimension('K')->setWidth(47);
        $sheet->getColumnDimension('L')->setWidth(19);

        // set cell value
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NIP Pegawai');
        $sheet->setCellValue('C1', 'Nama Pegawai');
        $sheet->setCellValue('D1', 'Status NPWP');
        $sheet->setCellValue('E1', 'Status Kawin');
        $sheet->setCellValue('F1', 'Tanggungan');
        $sheet->setCellValue('G1', 'Gaji');
        $sheet->setCellValue('H1', 'Tunjangan Lainnya, Uang Lembur, dan Sebagainya');
        $sheet->setCellValue('I1', 'Honorarium dan Imbalan Lainnya Sejenisnya');
        $sheet->setCellValue('J1', 'Premi Asuransi yang dibayar Pemberi Kerja');
        $sheet->setCellValue('K1', 'Tantiem, Bonus, Gratifikasi, Jasa Produksi dan THR');
        $sheet->setCellValue('L1', 'Nomor Telepon');

        // give border header data
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'borders' => [
                'allborders' => [
                    'style' => PHPExcel_Style_Border::BORDER_THICK
                ]
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
            ]
        ];
        $sheet->getStyle('A1:L1')->applyFromArray($styleArray);

        $pegawai_client = $this->db->query("select * from pegawai_client, client where pegawai_client.id_client=client.id_client and client.id_client='$id'")->result();
        $no = 1;
        $baris = 2;
        foreach($pegawai_client as $row){
            $sheet->setCellValue('A'.$baris, $no++);
            $sheet->setCellValue('B'.$baris, $row->nip_pegawai_client);
            $sheet->setCellValue('C'.$baris, $row->nama_pegawai_client);
            $sheet->setCellValue('D'.$baris, $row->status_npwp);
            $sheet->setCellValue('E'.$baris, $row->status_kawin);
            $sheet->setCellValue('F'.$baris, $row->tanggungan);
            $sheet->setCellValue('G'.$baris, $row->gaji);
            $sheet->setCellValue('H'.$baris, $row->tunjangan_lain);
            $sheet->setCellValue('I'.$baris, $row->honorarium);
            $sheet->setCellValue('J'.$baris, $row->premi_asuransi);
            $sheet->setCellValue('K'.$baris, $row->bonus);
            $sheet->setCellValue('L'.$baris, $row->no_telp_pegawai_client);

            $baris++;
        }

        // give border data
        $styleArrayData = [
            'borders' => [
                'allborders' => [
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                ]
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
            ]
        ];
        $sheet->getStyle('A2:L'.($baris-1))->applyFromArray($styleArrayData);

        $filename = "Data Pegawai Client".'.xlsx';
        $sheet->setTitle("Data Pegawai");

        header('Content-Type: Application/vnd.opensmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($spreadsheet, 'Excel2007');
        $writer->save('php://output');

        exit;
        //End code use third party phpexcel-1.8
    }
}
