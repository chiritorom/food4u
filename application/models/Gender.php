<?php

class Gender extends CI_Model {

	public function findAll() {
		return $this->db->get("gender");
	}

}