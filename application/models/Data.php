<?php

class Data extends CI_Model {

	public function findByPage($url = "") {
		$this->db->from('data');
		$this->db->join('page', 'page.idPage = data.idPage');
		$this->db->where(array('page.url' => $url));
		$this->db->order_by("data.position", "asc");
		return $this->db->get();
	}

/*	public function findByUrl($url = "") {
		$result = $this->db->get_where('page', array('url' => $url), 1);
        return $result->row();
	}*/

}
