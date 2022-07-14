<?php

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		$data['template'] = $this->front_template->selectTemplate()->result();
		$this->loadView('home', 'Home', $data);
	}

	public function loadView($view, $titlePage = "", Array $data = [] )
	{
		$template['title'] = $titlePage;
		$template['item_sidenav_active'] = "Home";
		$template['page'] = $this->load->view('front/page/home/' . $view, $data, true);
		$this->load->view('front/template', $template);
	}
}

?>
