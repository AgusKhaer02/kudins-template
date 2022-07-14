<?php
class MasterCategories extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		admin_check_session();
	}
	public function index()
	{
		$column = [
			"id_category",
			"category",
			"CONCAT(SUBSTR(description, 1, 20), '...') as description",
			"cover_image"
		];
		$data['categories'] = $this->master_categories->selectCategory($column)->result();
		$this->loadView('category','Master Categories', $data);
	}

	public function add_form()
	{
		$this->loadView('add','Add Category');
	}

	public function edit_form()
	{
		$id = $this->input->get('id_category');
		$where = [
			"id_category" => $id
		];
		$data['categories'] = $this->master_categories->selectCategory("*", $where)->row();
		$this->loadView('edit','Edit Category', $data);
	}

	public function edit_category()
	{
		$input = $this->input->post();

		$nm_file = "";
		if ($input['recent_cover_image'] != null && $input['recent_cover_image'] != '') {
			$nm_file = $input['recent_cover_image'];
		}else{
			$nm_file = "category-" . time() . '.png';
		}

		$input['cover_image'] = $nm_file;
		unset($input['recent_cover_image']);
		
		$config['upload_path'] = './images/category/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name'] = $nm_file;
		$config['overwrite'] = TRUE;
		$this->upload->initialize($config);
		
		if ($this->upload->do_upload('cover_image')) {
			$image = $this->upload->data();
			

			$where = [
				'id_category' => $input['id_category'],
			];

			$result = $this->crud->updateData("template_category", $input, $where);

			if ($result) {
				$this->etc->showMessage(200, "Category has been successfully updated!");
				redirect(site_url('admin/MasterCategories'));
			}
			
			$this->etc->showMessage(400, "Failed to update Category");
			redirect(site_url('admin/MasterCategories'));
			return;
		}

		$errMessage = $this->upload->display_errors();
		if ($errMessage == "<p>You did not select a file to upload.</p>") {
			// tetap lanjutkan proses input ke database
			// karna ada opsi ketika tidak upload gambar.
			
			$where = [
				'id_category' => $input['id_category'],
			];

			$result = $this->crud->updateData("template_category", $input, $where);

			if ($result) {
				$this->etc->showMessage(200, "Category has been successfully updated!");
				redirect(site_url('admin/MasterCategories'));
			}
			
			$this->etc->showMessage(400, "Failed to update Category");
			redirect(site_url('admin/MasterCategories'));
			return;
		}

		$this->etc->showMessage(400, "Error Upload Image :" . $errMessage);
		redirect(site_url('admin/MasterCategories'));
	}

	public function add_category()
	{
		$input = $this->input->post();
		$input['id_category'] = $this->etc->gen_uuid();

		$nm_file = 'category' . time() . '.png';
		$config['upload_path'] = './images/category/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name'] = $nm_file;
		$config['overwrite'] = TRUE;
		$this->upload->initialize($config);
		
		if ($this->upload->do_upload('cover_image')) {
			$image = $this->upload->data();
			$input['cover_image'] = $image['file_name'];

			$result = $this->crud->insertData("template_category",$input);

			if ($result) {
				$this->etc->showMessage(200, "New category has been successfully added");
				redirect(site_url('admin/MasterCategories'));
				return;
			}

			$this->etc->showMessage(400, "Failed to add new category");
			redirect(site_url('admin/MasterCategories'));
			return;
		
		}

		$errMessage = $this->upload->display_errors();
		if ($errMessage == "<p>You did not select a file to upload.</p>") {
			// tetap lanjutkan proses input ke database
			// karna ada opsi ketika tidak upload gambar
			$result = $this->crud->insertData("template_category",$input);
			if ($result) {
				$this->etc->showMessage(200, "New category has been successfully added");
				redirect(site_url('admin/MasterCategories'));
				return;
			}

			$this->etc->showMessage(400, "Failed to add new category");
			redirect(site_url('admin/MasterCategories'));
			return;
		}

		$this->etc->showMessage(400, "Error Upload Image :" . $errMessage);
		redirect(site_url('admin/MasterCategories'));

	}

	public function delete_category()
	{
		$input = $this->input->get();

		$query = "DELETE template_category FROM `template_category` "
		."LEFT JOIN template_subcategory ON template_category.id_category = template_subcategory.id_category "
		."LEFT JOIN template ON template_subcategory.id_subcategory = template.id_subcategory "
		."LEFT JOIN collections ON collections.id_template = template.id_template "
		."LEFT JOIN template_gallery ON template_gallery.id_template = template.id_template "
		."WHERE template_category.id_category ='".$input['id_category']."' ";

		
		$removeImg = $this->removeImage($input['recent_cover_image']);
		if ($removeImg) {
			$result = $this->crud->deleteData(null,null,$query);
			if ($result) {
				$this->etc->showMessage(200, "Category has been sucessfully deleted!");
				redirect(site_url('admin/MasterCategories'));
				return;
			}

			$this->etc->showMessage(400, "Failed to delete this category!");
			redirect(site_url('admin/MasterCategories'));
			return;
		}
		
		$result = $this->crud->deleteData(null,null,$query);
		$this->etc->showMessage(200, "Category has been sucessfully deleted!");
		redirect(site_url('admin/MasterCategories'));

	}


	public function loadView($view, $titlePage = "", Array $data = [] )
	{
		$template['title'] = $titlePage;
		$template['item_sidenav_active'] = "Master Categories";
		$template['page'] = $this->load->view('admin/page/category/' . $view, $data, true);
		$this->load->view('admin/template', $template);
	}


	
	public function removeImage($fileName)
	{
		if (!empty($fileName) && $fileName != null && $fileName != "example.png") {
			unlink('./images/category/'.$fileName);
			return true;
		}
		return false;
	}
}
?>
