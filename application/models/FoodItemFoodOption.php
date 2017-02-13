<?php

class FoodItemFoodOption extends CI_Model {

	public function findByFoodItem() {
		$this->db->join('fooditem', 'fooditem.idFoodItem = fooditemfoodoption.idFoodItem');
		return $this->db->get('fooditemfoodoption');
	}

}