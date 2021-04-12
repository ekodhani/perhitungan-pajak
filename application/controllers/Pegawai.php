<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;

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

    public function tax_calculate()
    {
        $data['title'] = "Tax Calculation";
        // menampilkan data pegawai selain session yang sudah ter set
        $id = $this->session->nip;
        $data['user'] = $this->db->query("SELECT * FROM `pegawai` WHERE nip != '$id' ")->result();
        // menseleksi data pegawai berdasarkan nip yang telah ter set
        $data['pegawai'] = $this->M_PPH->select(['nip' =>$this->session->userdata('nip')], 'pegawai')->row_array();
        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/sidebar', $data);
        $this->load->view('pegawai/tax_calculate');
        $this->load->view('tamplate/footer');
    }

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

    // function untuk menambah client
    public function tambahClient()
    {
        $this->form_validation->set_rules('nama_client', 'Nama Client', 'required', [
            'required' => 'Nama Harap di Isi'
        ]);
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric',[
            'required' => 'Nip Harap di Isi',
            'numeric' => 'NIP harus berupa angka'
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
            $nip = $this->input->post('nip');
            $nama_client = $this->input->post('nama_client');
            $alamat = $this->input->post('alamat');
            $no_telp = $this->input->post('no_telp');

            $data = [
                'nip' => $nip,
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

    public function deleteClient($id)
    {
        #code
        $tables = ['client', 'pegawai_client'];
        $this->db->where('id_client', $id);
        $this->db->delete($tables);
        $this->session->set_flashdata('message', 'Data Client Terhapus');
        redirect(base_url('pegawai/client'));
    }

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
            $gaji = $this->input->post('gaji');
            $no_telp_pc = $this->input->post('no_telp_pc');

            $data = [
                'nip_pegawai_client' => $nip_pc,
                'nama_pegawai_client' => $nama_pc,
                'gaji' => $gaji,
                'no_telp_pegawai_client' => $no_telp_pc,
                'id_client' => $id
            ];

            $this->db->insert('pegawai_client', $data);
            
            $this->session->set_flashdata('message', 'Data Berhasil Di Tambah');
            redirect('pegawai/detail_client/'.$id);
        }
    }

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

    public function exportXlsx()
    {
        /*code use third part PhpSpreadSheet
        require(APPPATH. 'third_party/PhpSpreadsheet-master/src/PhpSpreadsheet/Spreadsheet.php');
        require(APPPATH. 'third_party/PhpSpreadsheet-master/src/PhpSpreadsheet/Writer/Xlsx.php');

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nip');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Jabatan');

        $pegawai = $this->db->get('pegawai')->result();
        $no = 1;
        foreach($pegawai as $row){
            $sheet->setCellValue('A2', $no++);
            $sheet->setCellValue('B2', $row->nip);
            $sheet->setCellValue('C2', $row->nama_pegawai);
            $sheet->setCellValue('D2', $row->jabatan);
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Data Pegawai';

        header('Content-Type: Application/vnd.ms-excel');
        header('Content-Disposition: Attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        */
        
        //code use third party phpexcel-1.8
        require(APPPATH. 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $spreadsheet = new PHPExcel();

        $spreadsheet->getProperties()->setCreator("CV. Buana Makmur Consulting");
        $spreadsheet->getProperties()->setLastModifiedBy("CV. Buana Makmur Consulting");
        $spreadsheet->getProperties()->setTitle("Data Pegawai");

        $spreadsheet->setActiveSheetIndex(0);

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nip');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Jabatan');

        $pegawai = $this->db->get('pegawai')->result();
        $no = 1;
        $baris = 2;
        foreach($pegawai as $row){
            $sheet->setCellValue('A'.$baris, $no++);
            $sheet->setCellValue('B'.$baris, $row->nip);
            $sheet->setCellValue('C'.$baris, $row->nama_pegawai);
            $sheet->setCellValue('D'.$baris, $row->jabatan);

            $baris++;
        }

        $filename = "Data Pegawai".'.xlsx';
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
