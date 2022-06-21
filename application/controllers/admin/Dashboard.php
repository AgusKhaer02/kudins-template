<?php

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{

		$this->loadView('dashboard','Dashboard');
	}

	public function loadView($view, $titlePage = "", Array $data = [] )
	{
		$template['title'] = $titlePage;
		$template['page'] = $this->load->view('admin/page/' . $view, $data, true);
		$this->load->view('admin/template', $template);
	}
}

?>
