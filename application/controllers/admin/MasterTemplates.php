<?php

	class MasterTemplates extends CI_Controller {
	
		function __construct()
		{
			parent::__construct();
			
		}
		public function index()
		{

			$this->loadView('master_templates','Master Templates',$data);
		}

		public function loadView($view, $titlePage = "", Array $data = [] )
		{
			$template['title'] = $titlePage;
			$template['page'] = $this->load->view('admin/page/' . $view, $data, true);
			$this->load->view('admin/template', $template);
		}
	}
	
?>
