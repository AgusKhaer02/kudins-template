<?php

    class MasterTemplates extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            admin_check_session();
        }
        public function index()
        {
            $column = [
                "template.id_template",
                "template.name",
                "CONCAT(SUBSTR(template.description, 1, 20), '...') as description",
                "template.last_update",
                "template.released",
                "template.price",
                "template.image",
                "IF(template.is_free=1, 'Yes','No') as is_free",
                "template_subcategory.subcategory",
				"template.template_file"
            ];
            $data['templates'] = $this->master_template->selectTemplate($column)->result();
            $this->loadView('master_templates', 'Master Templates', $data);
        }

        public function add_form()
        {
            $colSubcategory = [
                "template_subcategory.id_subcategory",
                "template_subcategory.subcategory",
				"template_category.category"
            ];
            $data['list_subcategory'] = $this->master_subcategory->selectSubcategory($colSubcategory)->result();
            if ($data['list_subcategory'] == null || empty($data['list_subcategory'])) {
                $this->etc->showMessage(400, "Error: List Subcategory is not exist, Please add new List Subcategory!");
                redirect(site_url('admin/MasterTemplates'));
            }
            $this->loadView('add', 'Add new template', $data);
        }

        public function add_template()
        {
            $input = $this->input->post();
            $input['id_template'] = $this->etc->gen_uuid();

            $input['template_file'] = $this->storeTemplateFile($input['name']);

            $nm_file = 'template-' . time() . '.png';
            $config['upload_path'] = './images/template/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = $nm_file;
            $config['overwrite'] = true;
            $this->upload->initialize($config);
            
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $input['image'] = $image['file_name'];

                $result = $this->crud->insertData("template", $input);
                if ($result) {
                    $this->etc->showMessage(200, "Template has been added successfully!");
                    redirect(site_url('admin/MasterTemplates'));
                    return;
                }

                $this->etc->showMessage(400, "Failed to add new template");
                redirect(site_url('admin/MasterTemplates'));
                return;
            }

            $errMessage = $this->upload->display_errors();
            if ($errMessage == "<p>You did not select a file to upload.</p>") {
                // tetap lanjutkan proses input ke database
                // karna ada opsi ketika tidak upload gambar
                $result = $this->crud->insertData("template", $input);
                if ($result) {
                    $this->etc->showMessage(200, "Template has been added successfully!");
                    redirect(site_url('admin/MasterTemplates'));
                    return;
                } else {
                    $this->etc->showMessage(400, "Failed to add new template");
                    redirect(site_url('admin/MasterTemplates'));
                    return;
                }
            }

            $this->etc->showMessage(400, "Error Upload Image :" . $errMessage);
            redirect(site_url('admin/MasterTemplates'));
        }


        public function storeTemplateFile($templateName, $newName = true)
        {
			$nm_file = "";
            if ($newName) {
				$nm_file = $templateName . '-' . time() . '.zip';
			}else{
				$nm_file = $templateName;
			}
			
            $config['upload_path'] = './file_template_master/';
            $config['allowed_types'] = '*';
            $config['file_name'] = $nm_file;
			$config['overwrite'] = true;
            $this->upload->initialize($config);
            if ($this->upload->do_upload('template_file')) {
                $image = $this->upload->data();
                return $image['file_name'];
            }
            $errMessage = $this->upload->display_errors();
            return null;
        }

        public function delete_template()
        {
            $input = $this->input->get();
    
            $query = "DELETE template FROM `template` "
            ."LEFT JOIN collections ON collections.id_template = template.id_template "
            ."LEFT JOIN template_gallery ON template_gallery.id_template = template.id_template "
            ."WHERE template.id_template ='".$input['id_template']."' ";
            
            $removeImg = $this->removeImage($input['recent_image']);
            $removeFile = $this->removeFileMasterTemplate($input['recent_template_file']);
            if ($removeImg == true && $removeFile == true) {
                $result = $this->crud->deleteData(null, null, $query);
                if ($result) {
                    $this->etc->showMessage(200, "Template has been sucessfully deleted!");
                    redirect(site_url('admin/MasterTemplates'));
                    return;
                }
            }
            
            $result = $this->crud->deleteData(null, null, $query);
            $this->etc->showMessage(200, "Template has been sucessfully deleted!");
            redirect(site_url('admin/MasterTemplates'));
        }

        public function edit_form()
        {
            $input = $this->input->get();
            $column = [
                "template.id_template",
                "template.name",
                "template.description",
                "template.price",
                "template.is_free",
                "template_subcategory.id_subcategory",
                "template_subcategory.subcategory",
                "template.image",
				"template.template_file"
            ];
            $where = [
                "template.id_template" => $input['id_template']
            ];
            $data['template'] = $this->master_template->selectTemplate($column, $where)->row();
            $colSubcategory = [
                "id_subcategory",
                "subcategory"
            ];
            $data['list_subcategory'] = $this->master_subcategory->selectSubcategory($colSubcategory)->result();
            if ($data['list_subcategory'] == null || empty($data['list_subcategory'])) {
                $this->etc->showMessage(400, "Error: List Subcategory is not exist, Please add new List Subcategory!");
                redirect(site_url('admin/MasterTemplates'));
            }
            $this->loadView('edit', 'Edit Templates', $data);
        }

        public function edit_template()
        {
            $input = $this->input->post();
    
            $nm_file = "";
            if ($input['recent_image'] != null && $input['recent_image'] != '') {
                $nm_file = $input['recent_image'];
            } else {
                $nm_file = "template-" . time() . '.png';
            }

            $templateFile = "";
            if ($input['recent_template_file'] != null && $input['recent_template_file'] != '') {
                $templateFile = $input['recent_template_file'];
            } else {
                $templateFile = $input['name'] . "-" . time() . '.png';
            }
			unset($input['recent_template_file']);

			// new name = false
            $input['template_file'] = $this->storeTemplateFile($templateFile, false);
            if ($input['template_file'] == null) {
                unset($input['template_file']);
            }

            $input['image'] = $nm_file;
            unset($input['recent_image']);
            
            
            $config['upload_path'] = './images/template/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = $nm_file;
            $config['overwrite'] = true;
            $this->upload->initialize($config);
            
            if ($this->upload->do_upload('image')) {
                $where = [
                    'id_template' => $input['id_template'],
                ];
    
                $result = $this->crud->updateData("template", $input, $where);
    
                if ($result) {
                    $this->etc->showMessage(200, "Template has been successfully updated!");
                    redirect(site_url('admin/MasterTemplates'));
                }
                
                $this->etc->showMessage(400, "Failed to update Template");
                redirect(site_url('admin/MasterTemplates'));
                return;
            }
    
            $errMessage = $this->upload->display_errors();
            if ($errMessage == "<p>You did not select a file to upload.</p>") {
                // tetap lanjutkan proses input ke database
                // karna ada opsi ketika tidak upload gambar.
                
                $where = [
                    'id_template' => $input['id_template'],
                ];
    
                $result = $this->crud->updateData("template", $input, $where);

                if ($result) {
                    $this->etc->showMessage(200, "Template has been successfully updated!");
                    redirect(site_url('admin/MasterTemplates'));
                }
                
                $this->etc->showMessage(400, "Failed to update Template");
                redirect(site_url('admin/MasterTemplates'));
                return;
            }
    
            $this->etc->showMessage(400, "Error Upload Image :" . $errMessage);
            redirect(site_url('admin/MasterTemplates'));
        }

        public function loadView($view, $titlePage = "", array $data = [])
        {
            $template['title'] = $titlePage;
            $template['item_sidenav_active'] = "Master Templates";
            $template['page'] = $this->load->view('admin/page/master_templates/' . $view, $data, true);
            $this->load->view('admin/template', $template);
        }

        public function removeImage($fileName)
        {
            if (!empty($fileName) && $fileName != null && $fileName != "example.png") {
                unlink('./images/template/'.$fileName);
                return true;
            }
            return false;
        }

        
        public function removeFileMasterTemplate($fileName)
        {
            if (!empty($fileName) && $fileName != null) {
                unlink('./file_template_master/'.$fileName);
                return true;
            }
            return false;
        }
    }
