<?php

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		$this->load->view('admin/page/auth/login');
	}
	public function login()
	{
		
		$postInput = $this->input->post();

		// cek apakah isi inputan username dan pass kosong?
		if ($postInput['ip-username'] == "") {
			// jika kosong, maka munculkan pesan error inputan tidak boleh kosong
			$this->etc->showMessage(400, "Username field cannot be empty!");
			redirect(site_url('admin/Login'), 'refresh');
		}

		if ($postInput['ip-pass'] == "") {
			// jika kosong, maka munculkan pesan error inputan tidak boleh kosong
			$this->etc->showMessage(400, "Password field cannot be empty!");
			redirect(site_url('admin/Login'), 'refresh');
		}

		// rules
		$this->form_validation->set_rules('ip-username', 'username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('ip-pass', 'password', 'trim|required|xss_clean');
		// disini terdapat callback : callback_check_database()
		// digunakan untuk memanggil function check_database() di bawah

		// jika validasi gagal maka akan langsung dikembalikan ke login
		if ($this->form_validation->run() == false) {
			$this->etc->showMessage(400, "Username and password were invalid, please try again!");
			redirect(site_url('admin/Login'), 'refresh');
		}

		$encrypt_pass = md5($postInput['ip-pass']);

		// mengecek kedua dengan acara mengecek database
		$username = $postInput['ip-username'];
		$password = $encrypt_pass;

		$result = $this->auth->searchUser($username, $password);


		// jika hasilnya ada maka masukan ke session field nama dan username dengan nama session login 
		if ($result) {
			$this->auth->setSession($result->id_admin, $result->name, $result->username);
			$this->etc->showMessage(200, "Welcome! " . $result->name);
			redirect(site_url('admin/Dashboard'), 'location');
		}

		// pesan ini akan muncul ketika password dan email salah, tidak sesuai dengan data di database
		$this->etc->showMessage(400, "Username and password were missmatch, please try again!");
		redirect(site_url('admin/Login'), 'refresh');
	}


	public function logout()
	{
		$this->session->sess_destroy();
		$this->etc->showMessage(200, "Goodbye!");
		redirect(site_url('admin/Login'), 'refresh');
	}
}

?>
