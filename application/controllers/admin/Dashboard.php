<?php

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		admin_check_session();
	}
	public function index()
	{
		$this->loadView('dashboard','Dashboard');
	}

	public function loadView($view, $titlePage = "", Array $data = [] )
	{
		$template['title'] = $titlePage;
		$template['item_sidenav_active'] = "Dashboard";
		$template['page'] = $this->load->view('admin/page/dashboard/' . $view, $data, true);
		$this->load->view('admin/template', $template);
	}
}

?>
