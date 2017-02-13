<?php

class FoodItem extends CI_Model {

	public function findByFoodMenu($idfoodmenu = "") {
		return $this->db->get_where('fooditem', array('idFoodMenu' => $idfoodmenu));
	}

}