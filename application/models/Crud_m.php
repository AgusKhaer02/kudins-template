<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Crud_m extends CI_Model
{

    public function insertData($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function insertBatch($table, $data)
    {
        return $this->db->insert_batch($table, $data);
    }

    public function updateData($table, $data, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function deleteData($table, $where, $q_join = null)
    {
		if ($q_join != null) {
			return $this->db->query($q_join);
		}else {
			$this->db->where($where);
			return $this->db->delete($table);
		}
        
    }
}

/* End of file Crud.php */
