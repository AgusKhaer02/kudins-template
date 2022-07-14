<?php

	
	
	class FrontProfile_m extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
	
		public function selectCollection($column = "*", $where = [], $orderBy = null, $like = null, $limit = [], $isShowCompile = false)
		{
	
			$q= $this->db->select($column)
				->join("user","collections.id_user = user.id_user")
				->join("template","collections.id_template = template.id_template")
				->from("collections");
				
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
