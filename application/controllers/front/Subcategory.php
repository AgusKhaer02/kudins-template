<?php

class Subcategory extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		$id = $this->input->get('id_category');
		$column = [
			"template_subcategory.id_subcategory",
			"template_subcategory.subcategory",
			"template_category.category as category_name",
			"template_category.description as category_desc",
			"template_subcategory.cover_image",
		];
		$where = [
			"template_category.id_category" => $id
		];
		$data['subcategory'] = $this->front_subcategory->selectSubcategory($column,$where)->result();
		$data['category_name'] = $data['subcategory'][0]->category_name;
		$data['category_desc'] = $data['subcategory'][0]->category_desc;
		$column = [
			"template.id_template",
			"template.name",
			"template.description",
			"template.price",
			"template.is_free",
			"template.image"
		];
		$searchSubcategory = "(SELECT template_subcategory.id_subcategory FROM template_subcategory JOIN template_category ON template_subcategory.id_category = template_category.id_category WHERE template_subcategory.id_category = '$id')";
		$where = "template.id_subcategory in ($searchSubcategory)" ;
		$data['product_by_category'] = $this->front_template->selectTemplate($column, $where)->result();
		$this->loadView('subcategory','Subcategory', $data);
	}
	
	public function loadView($view, $titlePage = "", Array $data = [] )
	{
		$template['title'] = $titlePage;
		$template['item_sidenav_active'] = "Category";
		$template['page'] = $this->load->view('front/page/category/subcategory/' . $view, $data, true);
		$this->load->view('front/template', $template);
	}
}
?>
