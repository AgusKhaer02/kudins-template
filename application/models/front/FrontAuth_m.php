<?php

	
	
	class FrontAuth_m extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
	

		public function searchUser($email, $password)
		{
			$q= $this->db->select("*")
				->where("email", $email)
				->where("password", $password)
				->from("user");
			return $q->get()->row();
		}
	}
?>
