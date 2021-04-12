<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Chat Room";
        $nip = $_GET['nip'];
        $id_result = $this->session->nip;
        $data['pegawai'] = $this->M_PPH->select(['nip' =>$this->session->userdata('nip')], 'pegawai')->row_array();
        $data['user'] = $this->db->query("SELECT * FROM `pegawai` WHERE nip != '$id_result' ")->result();
        $data['user_active'] = $this->M_PPH->select(['nip' => $nip], 'pegawai')->row_array();
        $data['message'] = $this->M_PPH->select(['incoming_msg_id' => $this->session->userdata('nip')], 'messages')->result(); 
        $this->load->view('pegawai/chat', $data);
    }

    public function getChat()
    {
        if ( !$this->session->userdata('nip') ) {
            redirect(base_url());
        }
            $outgoing_id = $this->session->userdata('nip');
            $incoming_id = $this->input->post('incoming_id');
            $output= "";

            $result = $this->db->query("SELECT * FROM messages LEFT JOIN pegawai ON pegawai.nip = messages.outgoing_msg_id WHERE (outgoing_msg_id = $outgoing_id AND incoming_msg_id = $incoming_id) OR (outgoing_msg_id = $incoming_id AND incoming_msg_id = $outgoing_id) ORDER BY msg_id")->result_array();

            // var_dump($result);
            // die;

            // mengecek Query
            if ($result != null) {
                // lakukan statement ini
                foreach ($result as $row ) {
                    # code...
                    if($row['outgoing_msg_id'] === $outgoing_id){
                        $output .= '<div class="chat outgoing">
                                        <div class="details">
                                            <p class="bg-gradient-danger">'. $row['msg'].'</p>
                                        </div>
                                        <img src="'.base_url('assets/image/profile/'.$row['gambar']).'" class="rounded-circle" alt="profile">
                                    </div>';
                    } else {
                        $output .= '<div class="chat incoming">
                                        <img src="'.base_url('assets/image/profile/'.$row['gambar']).'" class="rounded-circle" alt="profile">
                                        <div class="details">
                                            <p class="bg-gradient-primary">'. $row['msg'].'</p>
                                        </div>
                                    </div>';
                    }
                }
            } else {
                $output .= '<div class="text-secondary font-weight-bold text-center mt-5 p-5">No messages are available. Once you send message they will appear here.</div>';
            }

            echo $output;

            // $this->db->select('*');
            // $this->db->from('messages');
            // $this->db->join('pegawai', 'pegawai.nip = messages.outgoing_msg_id', 'left');
            // $this->db->where('outgoing_msg_id', $outgoing_id);
            // $this->db->where('incoming_msg_id', $incoming_id);
            // $this->db->or_where('outgoing_msg_id = ', $incoming_id);
            // $this->db->where('incoming_msg_id', $outgoing_id);
            // $this->db->order_by('msg_id');
            // $query = $this->db->get();

    }

    public function insertChat()
    {
        if (!$this->session->userdata('nip')) {
            redirect('login');
        }
        $data = [
            'outgoing_msg_id' => htmlspecialchars($this->session->userdata('nip')),
            'incoming_msg_id' => $this->input->post('incoming_id'),
            'msg' => $this->input->post('pesan')
        ];
        $this->db->insert('messages', $data);
    }
}