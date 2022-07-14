<?php
	class MasterSubcategory extends CI_Controller {


		function __construct()
		{
			parent::__construct();
			admin_check_session();
		}
		public function index()
		{
			
			$input = $this->input->get();
			$where = [
				"template_category.id_category" => $input['id_category'],
			];
			$column = [
				"template_subcategory.id_subcategory",
				"template_subcategory.subcategory",
				"CONCAT(SUBSTR(template_subcategory.description, 1, 20), '...') as description",
				"template_subcategory.cover_image"
			];
			$data['subcategory'] = $this->master_subcategory->selectSubcategory($column, $where)->result();
			$data['category_name'] = $input['category'];
			$data['id_category'] = $input['id_category'];
			$this->loadView('subcategory','Master Subcategories', $data);
		}
	
		public function add_form()
		{
			$input = $this->input->get();
			$data['id_category'] = $input['id_category'];
			$data['category'] = $input['category'];
			$this->loadView('add','Add Subcategory', $data);
		}
	
		public function edit_form()
		{
			$input = $this->input->get();
			$where = [
				"id_subcategory" => $input['id_subcategory']
			];
			$column = [
				"template_subcategory.id_subcategory",
				"template_subcategory.subcategory",
				"template_subcategory.description",
				"template_category.id_category",
				
			];
			$data['subcategory'] = $this->master_subcategory->selectSubcategory($column, $where)->row();
			$data['id_category'] = $input['id_category'];
			$data['category'] = $input['category'];
			$data['id_subcategory'] = $input['id_subcategory'];
			$data['recent_cover_image'] = $input['recent_cover_image'];
			$this->loadView('edit','Edit Subcategory', $data);
		}
	
		public function edit_subcategory()
		{
			$input = $this->input->post();
			$category = $input['category'];
			unset($input['category']);
			$nm_file = "";
			if ($input['recent_cover_image'] != null && $input['recent_cover_image'] != '') {
				$nm_file = $input['recent_cover_image'];
			}else{
				$nm_file = "subcategory" . time() . '.png';
			}
	
			$input['cover_image'] = $nm_file;
			unset($input['recent_cover_image']);
			
			$config['upload_path'] = './images/category/subcategory';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['file_name'] = $nm_file;
			$config['overwrite'] = TRUE;
			$this->upload->initialize($config);
			
			if ($this->upload->do_upload('cover_image')) {
				$image = $this->upload->data();
				
	
				$where = [
					'id_subcategory' => $input['id_subcategory'],
				];
	
				$result = $this->crud->updateData("template_subcategory", $input, $where);
	
				if ($result) {
					$this->etc->showMessage(200, "Subcategory has been successfully updated");
					redirect(site_url('admin/MasterSubcategory' . '?id_category=' . $input['id_category'] . '&category=' . $category));
				}else {
					$this->etc->showMessage(400, "Failed to update subcategory");
					redirect(site_url('admin/MasterSubcategory' . '?id_category=' . $input['id_category'] . '&category=' . $category));
				}
			}
	
			$errMessage = $this->upload->display_errors();
			if ($errMessage == "<p>You did not select a file to upload.</p>") {
				// tetap lanjutkan proses input ke database
				// karna ada opsi ketika tidak upload gambar.
				
				$where = [
					'id_subcategory' => $input['id_subcategory'],
				];
	
	
				$result = $this->crud->updateData("template_subcategory", $input, $where);

				if ($result) {
					$this->etc->showMessage(200, "Subcategory has been successfully updated");
					redirect(site_url('admin/MasterSubcategory' . '?id_category=' . $input['id_category'] . '&category=' . $category));
				}else {
					$this->etc->showMessage(400, "Failed to update subcategory");
					redirect(site_url('admin/MasterSubcategory' . '?id_category=' . $input['id_category'] . '&category=' . $category));
				}
			}
	
			$this->etc->showMessage(400, "Error Upload Image :" . $errMessage);
			redirect(site_url('admin/MasterSubcategory' . '?id_category=' . $input['id_category'] . '&category=' . $category));
		}
	
		public function add_subcategory()
		{
			$input = $this->input->post();
			$category = $input['category'];
			unset($input['category']);
			$input['id_subcategory'] = $this->etc->gen_uuid();
	
			$nm_file = 'subcategory' . time() . '.png';
			$config['upload_path'] = './images/category/subcategory';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['file_name'] = $nm_file;
			$config['overwrite'] = TRUE;
			$this->upload->initialize($config);
			
			if ($this->upload->do_upload('cover_image')) {
				$image = $this->upload->data();
				$input['cover_image'] = $image['file_name'];
	
				$result = $this->crud->insertData("template_subcategory",$input);
	
				if ($result) {
					$this->etc->showMessage(200, "New subcategory has been successfully added");
					redirect(site_url('admin/MasterSubcategory' . '?id_category=' . $input['id_category'] . '&category=' . $category));
					return;
				}
	
				$this->etc->showMessage(400, "New subcategory has not been successfully added!");
				redirect(site_url('admin/MasterSubcategory' . '?id_category=' . $input['id_category'] . '&category=' . $category));
				return;
			
			}
	
			$errMessage = $this->upload->display_errors();
			if ($errMessage == "<p>You did not select a file to upload.</p>") {
				// tetap lanjutkan proses input ke database
				// karna ada opsi ketika tidak upload gambar
				$result = $this->crud->insertData("template_subcategory",$input);
				if ($result) {
					$this->etc->showMessage(200, "Tambah data user berhasil!");
					redirect(site_url('admin/MasterSubcategory' . '?id_category=' . $input['id_category'] . '&category=' . $category));
				}else {
					$this->etc->showMessage(400, "Tambah data user gagal!");
					redirect(site_url('admin/MasterSubcategory' . '?id_category=' . $input['id_category'] . '&category=' . $category));
				}
			}
	
			$this->etc->showMessage(400, "Error Upload Image :" . $errMessage);
			redirect(site_url('admin/MasterCategories'));
	
		}
	
		public function delete_subcategory()
		{
			$input = $this->input->get();
			$category = $input['category'];
			unset($input['category']);
			
			$query = "DELETE template_subcategory FROM `template_subcategory` "
				."LEFT JOIN template ON template_subcategory.id_subcategory = template.id_subcategory "
				."LEFT JOIN collections ON collections.id_template = template.id_template "
				."LEFT JOIN template_gallery ON template_gallery.id_template = template.id_template "
				."WHERE template_subcategory.id_subcategory ='".$input['id_subcategory']."' ";

			$removeImg = $this->removeImage($input['recent_cover_image']);
			unset($input['recent_cover_image']);
			if ($removeImg) {
				$result = $this->crud->deleteData("template_subcategory", null, $query);
				if ($result) {
					$this->etc->showMessage(200, "Subcategory has been sucessfully deleted!");
					redirect(site_url('admin/MasterSubcategory' . '?id_category=' . $input['id_category'] . '&category=' . $category));
					return;
				}
	
				$this->etc->showMessage(400, "Failed to delete this subcategory!");
				redirect(site_url('admin/MasterSubcategory' . '?id_category=' . $input['id_category'] . '&category=' . $category));
				return;
			}
			$result = $this->crud->deleteData("template_subcategory",null, $query);
	
			$this->etc->showMessage(200, "Subcategory has been sucessfully deleted!");
			redirect(site_url('admin/MasterSubcategory' . '?id_category=' . $input['id_category'] . '&category=' . $category));
	
		}
	
	
		public function loadView($view, $titlePage = "", Array $data = [] )
		{
			$template['title'] = $titlePage;
			$template['item_sidenav_active'] = "Master Categories";
			$template['page'] = $this->load->view('admin/page/category/subcategory/' . $view, $data, true);
			$this->load->view('admin/template', $template);
		}


		public function removeImage($fileName)
		{
			if (!empty($fileName) && $fileName != null && $fileName != "example.png") {
				unlink('./images/category/subcategory/'.$fileName);
				return true;
			}
			return false;
		}
	}
?>
