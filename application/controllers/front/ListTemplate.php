<?php

class ListTemplate extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		$input = $this->input->get();
		$where = [
			"template.id_subcategory" => $input['id_subcategory']
		];
		$data['template'] = $this->front_template->selectTemplate("*", $where)->result();
		$data['subcategory_name'] = $data['template'][0]->subcategory;
		$data['subcategory_desc'] = $data['template'][0]->description;
		$this->loadView('list_template', "List Template", $data);
	}

	public function loadView($view, $titlePage = "", Array $data = [] )
	{
		$template['title'] = $titlePage;
		$template['item_sidenav_active'] = "";
		$template['page'] = $this->load->view('front/page/list_template/' . $view, $data, true);
		$this->load->view('front/template', $template);
	}
}
?>
