<?php

class Plate extends CI_Model {

	public function findAll() {
		$this->db->order_by("idPlate", "desc");
		return $this->db->get('plate');
	}
	
	public function findById($id) {
		$result = $this->db->get_where('plate', array('idPlate' => $id), 1);
		return $result->row();
	}

}
