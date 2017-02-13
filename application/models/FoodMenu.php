<?php

class FoodMenu extends CI_Model {

	public function findAll() {
		return $this->db->get("foodmenu");
	}

}