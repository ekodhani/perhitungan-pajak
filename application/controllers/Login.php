<?php
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
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
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

	public function logout()
	{
		$this->session->unset_userdata('email');

		$this->session->set_flashdata('message', '<p style="color: #1bcfb4; margin-left: 10px; font-weight: 600;">Thank You!</p>');
		redirect('login');
	}

	public function reset_password()
	{
		echo "Halo";
	}
}
