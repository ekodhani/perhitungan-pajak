<?php

use function PHPSTORM_META\map;

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required',[
			'required' => 'NIP Harus Di Isi!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',[
			'required' => 'Password Harus Di Isi!'
		]);
		if ($this->form_validation->run() == false) {
			$data['title'] = "Selamat Datang di Aplikasi Perhitungan Pajak Penghasilan | PPh";
			$this->load->view('login', $data);
		} else {
			$nip = $this->input->post('nip');
			$password = $this->input->post('password');

			$pegawai = $this->M_PPH->select(['nip' => $nip], 'pegawai')->row_array();

			if ($pegawai != null) {
				if (md5($password) == $pegawai['password']) {
					$data = [
						'nip' => $pegawai['nip']
					];

					$this->session->set_userdata($data);
					redirect(base_url('pegawai'));
				} else {
					$this->session->set_flashdata('message', '<p style="color: #fe7c96; margin-left: 10px; font-weight: 600;">Wrong Password!</p>');
					redirect(base_url());
				}
			} else {
				$this->session->set_flashdata('message', '<p style="color: #fe7c96; margin-left: 10px; font-weight: 600;">NIP not found!</p>');
				redirect(base_url());
			}
		}
	}

	public function signup()
	{
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|is_unique[pegawai.nip]',[
			'is_unique' => 'Nip Tidak Boleh Sama!',
			'numeric' => 'Nip Harus Berupa Angka!',
			'required' => 'Nip Harus Di isi!'
		]);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
			'required' => 'Nama Harus Di isi!'
		]);
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim',[
			'required' => 'Jabatan Harus Di isi!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]', [
			'min_length' => 'Password Minimal 5 Karakter!',
			'required' => 'Password Harus Di isi!'
		]);
		$this->form_validation->set_rules('password1', 'Retype Password', 'required|trim|min_length[5]|matches[password]', [
			'min_length' => 'Password Minimal 5 Karakter!',
			'matches' => 'Password Tidak Cocok!',
			'required' => 'Retype Password Harus Di isi!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Sign Up';
			$this->load->view('signup', $data);
		} else {
			$data = [
				'nip' => htmlspecialchars($this->input->post('nip'), true),
				'nama_pegawai' => htmlspecialchars($this->input->post('nama', true)),
				'jabatan' => htmlspecialchars($this->input->post('jabatan'), true),
				'password' => md5($this->input->post('password', true)),
				'gambar' => 'default.png'
			];

			$this->db->insert('pegawai', $data);
			$this->session->set_flashdata('message', '<p style="color: #1bcfb4; margin-left: 10px; font-weight: 600;">Berhasil Terdaftar!</p>');
			redirect('login');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'flowcat0310@gmail.com',
			'smtp_pass' => 'Dhaniflw2812',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);

		$this->email->from('flowcat0310@gmail.com', 'BMC');
		$this->email->to($this->input->post('email'));
		
		if($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="'.base_url().'login/resetpassword?nip='.$this->input->post('nip').'&token='.urlencode($token).'">Reset Password</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nip');

		$this->session->set_flashdata('message', '<p style="color: #1bcfb4; margin-left: 10px; font-weight: 600;">Thank You!</p>');
		redirect('login');
	}

	public function reset_password()
	{
		$this->form_validation->set_rules('nip','NIP','required',[
			'required' => 'NIP Harus Diisi!'
		]);
		$this->form_validation->set_rules('email','Email','required|valid_email',[
			'required' => 'NIP Harus Diisi!',
			'valid_email' => 'Email Tidak Valid'
		]);
		if ($this->form_validation->run() == false) {
			# code...
			$data['title'] = "Reset Password";
			$this->load->view('reset_password', $data);
		} else {
			$nip = $this->input->post('nip');
			$email = $this->input->post('email');
			$user = $this->M_PPH->select(['nip' => $nip], 'pegawai')->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'nip' => $nip,
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);

				$this->_sendEmail($token, 'forgot');
				$this->session->set_flashdata('message', '<p style="color: #1bcfb4; margin-left: 10px; font-weight: 600;">Please check your email to reset your password!</p>');
				redirect('login');
			} else {
				$this->session->set_flashdata('message', '<p style="color: #fe7c96; margin-left: 10px; font-weight: 600;">NIP Not Found!</p>');
				redirect('login/reset_password');
			}
		}
	}

	public function resetPassword()
	{
		$nip = $this->input->get('nip');
		$token = $this->input->get('token');

		$user = $this->M_PPH->select(['nip' => $nip], 'pegawai')->row_array();

		if ($user) {
			$user_token = $this->M_PPH->select(['token' => $token], 'user_token')->row_array();
			if ($user_token) {
				$this->session->set_userdata('reset_nip', $nip);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<p style="color: #fe7c96; margin-left: 10px; font-weight: 600;">Reset Password Failed! Wrong Token</p>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message', '<p style="color: #fe7c96; margin-left: 10px; font-weight: 600;">Reset Password Failed! NIP Not Found</p>');
			redirect('login');
		}
	}

	public function changePassword()
	{
		if(!$this->session->userdata('reset_nip')) {
			redirect('login');
		}

		$this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]|min_length[5]',[
			'required' => 'Password Baru Harus Di Isi!',
			'matches' => 'Password Tidak Sama!',
			'min_length' => 'Password Minimal 5 Karakter!'
		]);
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|matches[password1]|min_length[5]',[
			'required' => 'Password Baru Harus Di Isi!',
			'matches' => 'Password Tidak Sama!',
			'min_length' => 'Password Minimal 5 Karakter!'
		]);
		if ($this->form_validation->run() == false) {
			$data['title'] = "Change Password";
			$this->load->view('change_password', $data);
		} else {
			$password = md5($this->input->post('password1'));
			$nip = $this->session->userdata('reset_nip');

			$this->db->set('password', $password);
			$this->db->where('nip', $nip);
			$this->db->update('pegawai');

			$this->session->unset_userdata('reset_nip');
			$this->session->set_flashdata('message', '<p style="color: #1bcfb4; margin-left: 10px; font-weight: 600;">Password Berhasil Di Reset!</p>');
			redirect('login');
		}
	}
}
