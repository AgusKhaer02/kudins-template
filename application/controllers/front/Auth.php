<?php


class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		$this->load->view('front/page/auth/auth');	
	}

	public function signin()
	{
		
		$postInput = $this->input->post();

		// cek apakah isi inputan username dan pass kosong?
		if ($postInput['email'] == "") {
			// jika kosong, maka munculkan pesan error inputan tidak boleh kosong
			$this->etc->showMessage(400, "Email field cannot be empty!");
			redirect(site_url('front/Auth'), 'refresh');
		}

		if ($postInput['password'] == "") {
			// jika kosong, maka munculkan pesan error inputan tidak boleh kosong
			$this->etc->showMessage(400, "Password field cannot be empty!");
			redirect(site_url('front/Auth'), 'refresh');
		}

		// rules
		$this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
		// disini terdapat callback : callback_check_database()
		// digunakan untuk memanggil function check_database() di bawah

		// jika validasi gagal maka akan langsung dikembalikan ke Auth
		if ($this->form_validation->run() == false) {
			$this->etc->showMessage(400, "Email and password were invalid, please try again!");
			redirect(site_url('front/Auth'), 'refresh');
		}

		$encrypt_pass = md5($postInput['password']);

		// mengecek kedua dengan acara mengecek database
		$email = $postInput['email'];
		$password = $encrypt_pass;

		$result = $this->front_auth->searchUser($email, $password);

		// jika hasilnya ada maka masukan ke session field nama dan username dengan nama session Auth 
		if ($result) {
			$userdata = [
				"sess_front_kudins_template" => [
					"id_user" => $result->id_user,
					"email" => $result->email,
					"name" => $result->name,
				]
			];
			$this->session->set_userdata($userdata);
			
			$this->etc->showMessage(200, "Welcome! " . $result->name);
			redirect(site_url('front/Home'), 'refresh');
			return;
		}

		// pesan ini akan muncul ketika password dan email salah, tidak sesuai dengan data di database
		$this->etc->showMessage(400, "Username and password were missmatch, please try again!");
		redirect(site_url('front/Auth'), 'refresh');
		// echo $this->db->last_query();
	}

	public function signup()
	{
		$input = $this->input->post();
		$input['id_user'] = $this->etc->gen_uuid();
		$input['password'] = md5($input['password']);

		$result = $this->crud->insertData("user",$input);
		if ($result) {
			$this->etc->showMessage(200, "You've already signed up!");
			redirect(site_url('front/Auth'), 'location');
			return;
		}

		$this->etc->showMessage(400, "Something wrong");
		redirect(site_url('front/Auth'), 'location');
	}


	public function logout()
	{
		$this->session->sess_destroy();
		$this->etc->showMessage(200, "Goodbye!");
		redirect(site_url('front/Home'), 'refresh');
	}
}
?>
