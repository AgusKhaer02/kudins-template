<?php
	class Auth_m extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
		}
	
		public function searchUser($username, $password)
		{
			
			$q= $this->db->select("*")
				->where("username", $username)
				->where("password", $password)
				->from("admin");
			return $q->get()->row();
		}

		public function setSession($idAdmin, $name, $username)
		{
			$userdata = [
				"sess_admin_kudins_template"  => [
					"id_admin" => $idAdmin,
					"name" => $name,
					"username" => $username,
				]
			];
			$this->session->set_userdata($userdata);
		}


	}
?>
