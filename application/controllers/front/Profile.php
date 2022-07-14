<?php


class Profile extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		front_check_session();
	}
	public function index()
	{
		$id_user = $this->session->userdata('sess_front_kudins_template')['id_user'];
		$where = [
			"collections.id_user" => $id_user
		];
		$column = [
			"user.id_user",
			"collections.id_collection",
			"template.id_template",
			"template.name",
			"template.image",
		];
		$data['collection'] = $this->front_profile->selectCollection($column, $where)->result();
		$this->loadView("profile", "My Profile", $data);
	}
	public function loadView($view, $titlePage = "", Array $data = [] )
	{
		$template['title'] = $titlePage;
		$template['item_sidenav_active'] = "";
		$template['page'] = $this->load->view('front/page/profile/' . $view, $data, true);
		$this->load->view('front/template', $template);
	}
}

?>
