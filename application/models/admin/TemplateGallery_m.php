<?php
	class TemplateGallery_m extends CI_Model
	{

		public function selectGallery($column = "*", $where = [], $orderBy = null, $like = null, $limit = [], $isShowCompile = false)
		{
			$q= $this->db->select($column)
				->from("template_gallery");
				
			if (!empty($where)) {
				$q = $this->db->where($where);
			}
			if (!empty($orderBy)) {
				$q = $this->db->order_by($orderBy);
			}
			if (!empty($like)) {
				$q = $this->db->like($like);
			}
			if (!empty($limit)) {
				$q = $this->db->limit($limit[1], $limit[0]);
			}
	
			if ($isShowCompile) {
				return $q->get_compiled_select();
			} else {
				return $q->get();
			}

		}
	}
	
?>
