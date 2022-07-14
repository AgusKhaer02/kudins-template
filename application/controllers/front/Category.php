<?php


class Category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['category'] = $this->front_category->selectCategory()->result();
		$this->loadView('category', "Category", $data);
	}
	public function loadView($view, $titlePage = "", Array $data = [] )
	{
		$template['title'] = $titlePage;
		$template['item_sidenav_active'] = "Category";
		$template['page'] = $this->load->view('front/page/category/' . $view, $data, true);
		$this->load->view('front/template', $template);
	}
}
?>
