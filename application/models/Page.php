<?php

class Page extends CI_Model {

	public function findAll() {
		$this->db->where(array('state' => 1));
		$this->db->order_by("position", "asc");
		return $this->db->get('page');
	}

	public function findByUrl($url = "") {
		$result = $this->db->get_where('page', array('url' => $url), 1);
        return $result->row();
	}

}
