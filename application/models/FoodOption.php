<?php

class FoodOption extends CI_Model {

	public function findAll() {
		return $this->db->get("foodoption");
	}

}