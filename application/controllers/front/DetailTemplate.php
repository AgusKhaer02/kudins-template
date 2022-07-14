<?php


class DetailTemplate extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	
	}
	public function index()
	{
		// if ($this->input->get('id_template') != null && $this->input->get('id_template')!= "") {
		// 	if ($this->input->get('id_category') != null && $this->input->get('id_category')!= "") {
				
		// 	}

		// 	$this->etc->showMessage(400, "Something wrong");
		// 	redirect(site_url('front/Subcategory'));
		// }
		// cek collections
		$idTemplate = $this->input->get('id_template');

		$where = [
			"id_template" => $idTemplate
		];
		$data['collection_is_exist'] = false;
		if ($this->session->userdata('sess_front_kudins_template') != null) {
			$idUser = $this->session->userdata('sess_front_kudins_template')['id_user'];
			$collectionBy = [
				"collections.id_template" => $idTemplate,
				"collections.id_user" => $idUser,
			];
			$selectCollections = $this->front_profile->selectCollection("*",$collectionBy)->num_rows();
			$data['collection_is_exist'] = ($selectCollections > 0) ? true : false;
        }
		$data['detail_template'] = $this->front_template->selectTemplate("*",$where)->row();
		$data['gallery'] = $this->front_template->selectGallery("*", $where)->result();
		$this->loadView('detail_template', "Detail Template", $data);
	}
	public function loadView($view, $titlePage = "", Array $data = [] )
	{
		$template['title'] = $titlePage;
		$template['item_sidenav_active'] = "";
		$template['page'] = $this->load->view('front/page/detail_template/' . $view, $data, true);
		$this->load->view('front/template', $template);
	}


	public function download()
	{
		$fileName = $this->input->get('file_name');
		$nama_file = "./file_template_master/" . $fileName;
		force_download($nama_file, null);
	}

	public function purchase()
	{
		
	}
	
}
?>
