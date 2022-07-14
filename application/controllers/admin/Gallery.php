<?php
class Gallery extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		admin_check_session();
	}
	public function setIdTemplate()
	{
		if ($this->input->get() != null) {
			$input = $this->input->get();

			if ($this->session->userdata('value') == null) {
				$this->session->set_userdata([
					"value" => [
						"id_template" => $input['id_template']
					]
				]);
			}
		}
	}

	public function checkIdTemplate()
	{
		if ($this->session->userdata('value')['id_template'] == null) {
			$this->etc->showMessage(400, "ID template is not exist!");
			redirect(site_url('admin/MasterTemplates'));
			return;
		}
	}

	public function index()
	{
		$this->setIdTemplate();

		$this->checkIdTemplate();

		$where = [
			"id_template" => $this->session->userdata('value')['id_template']
		];
		$data['gallery'] = $this->template_gallery->selectGallery("*", $where)->result();
		$this->loadView('gallery','Template Gallery', $data);
	}

	public function add_form()
	{
		$this->loadView('add','Add Gallery');
	}

	public function add_gallery()
	{
		$this->checkIdTemplate();

		$data['id_gallery'] = $this->etc->gen_uuid();
		$data['id_template'] = $this->session->userdata('value')['id_template'];

		$nm_file = 'gallery-' . time() . '.png';
		$config['upload_path'] = './images/template/gallery/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name'] = $nm_file;
		$config['overwrite'] = TRUE;
		$this->upload->initialize($config);
		
		if ($this->upload->do_upload('image')) {
			$image = $this->upload->data();
			$data['image'] = $image['file_name'];

			$result = $this->crud->insertData("template_gallery",$data);
			if ($result) {
				$this->etc->showMessage(200, "Template has been added successfully!");
				redirect(site_url('admin/Gallery'));
				return;
			}

			$this->etc->showMessage(400, "Failed to add new template");
			redirect(site_url('admin/Gallery'));
			return;
		}

		$errMessage = $this->upload->display_errors();

		$this->etc->showMessage(400, $errMessage);
		redirect(site_url('admin/Gallery'));
	}

	public function edit_gallery()
	{
		$input = $this->input->post();

		$nm_file = "";
		if ($input['recent_gallery'] != null && $input['recent_gallery'] != '') {
			$nm_file = $input['recent_gallery'];
		}else{
			$nm_file = "gallery-" . time() . '.png';
		}

		$input['image'] = $nm_file;
		unset($input['recent_gallery']);
		
		$config['upload_path'] = './images/template/gallery/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name'] = $nm_file;
		$config['overwrite'] = TRUE;
		$this->upload->initialize($config);
		
		if ($this->upload->do_upload('image')) {
			$where = [
				'id_gallery' => $input['id_gallery'],
			];

			$result = $this->crud->updateData("template_gallery", $input, $where);

			if ($result) {
				$this->etc->showMessage(200, "Gallery has been successfully updated!");
				redirect(site_url('admin/Gallery'));
			}
			
			$this->etc->showMessage(400, "Failed to update Gallery");
			redirect(site_url('admin/Gallery'));
			return;
		}

		$errMessage = $this->upload->display_errors();
		$this->etc->showMessage(400, "Error Upload Image :" . $errMessage);
		redirect(site_url('admin/Gallery'));
	}



	public function edit_form()
	{
		$where = [
			"id_template" => $this->session->userdata('value')['id_template'],
		];
		$data['gallery'] = $this->template_gallery->selectGallery("*", $where)->row();
		$this->loadView('edit','Edit Gallery', $data);
	}

	public function delete_gallery()
	{
		$input = $this->input->get();

		$where = [
			"id_gallery" => $input['id_gallery'],
		];
		$removeImg = $this->removeImage($input['recent_gallery']);
		if ($removeImg) {
			$result = $this->crud->deleteData("template_gallery",$where);
			if ($result) {
				$this->etc->showMessage(200, "Gallery has been sucessfully deleted!");
				redirect(site_url('admin/Gallery'));
				return;
			}

			$this->etc->showMessage(400, "Failed to delete this gallery!");
			redirect(site_url('admin/Gallery'));
			return;
		}
		
		$result = $this->crud->deleteData("template_gallery",$where);
		$this->etc->showMessage(200, "Gallery has been sucessfully deleted!");
		redirect(site_url('admin/Gallery'));
	}

	
	public function removeImage($fileName)
	{
		if (!empty($fileName) && $fileName != null && $fileName != "example.png") {
			unlink('./images/template/gallery/'.$fileName);
			return true;
		}
		return false;
	}

	public function loadView($view, $titlePage = "", Array $data = [] )
	{
		$template['title'] = $titlePage;
		$template['item_sidenav_active'] = "Master Templates";
		$template['page'] = $this->load->view('admin/page/gallery/' . $view, $data, true);
		$this->load->view('admin/template', $template);
	}
}
?>
