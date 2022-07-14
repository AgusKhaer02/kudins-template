<?php

class Collections extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		front_check_session();
	}


	public function add_collection()
	{
		$input = $this->input->get();
		if ($input['id_template'] == null) {
			echo "
				<script>
					alert('Cant proceed because id template was empty');
					window.location.href = '".site_url('front/Home')."'
				</script>
			";
			return;
		}
		$input['id_collection'] = $this->etc->gen_uuid();
		$input['id_user'] = $this->session->userdata("sess_front_kudins_template")['id_user'];
		$result = $this->crud->insertData("collections", $input);

		if ($result) {
			$this->etc->showMessage(200, "New Collection has been successfully added");
			redirect($this->agent->referrer());
			return;
		}

		$this->etc->showMessage(400, "Failed to add new collection");
		redirect($this->agent->referrer());
		return;
	
	}

	public function remove_collection()
	{

		$input = $this->input->get();
		 
		$idUser = $this->session->userdata('sess_front_kudins_template')['id_user'];

		$where = [
			"id_user" => $idUser,
			"id_template" => $input['id_template'],
		];
		$result = $this->crud->deleteData("collections", $where);

		if ($result) {
			$this->etc->showMessage(200, "Your desired template has been removed from your collection!");
			redirect($this->agent->referrer());
			return;
		}

		$this->etc->showMessage(400, "Failed to remove collection");
		redirect($this->agent->referrer());
		return;
	}

	public function redirectTo()
	{
		if ($this->agent->is_referral()){

			$this->agent->referrer();
		
		}
	}
}
?>
