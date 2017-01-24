<?php

class FoodTitle extends CI_Model {

	public function findAll() {
		return $this->db->get("foodtitle");
	}

}