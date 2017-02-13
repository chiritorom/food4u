<?php

class FoodMenuFoodTitle extends CI_Model {

	public function findByFoodMenu($idfoodmenu = "") {
		$this->db->join('foodtitle', 'foodtitle.idFoodTitle = foodmenufoodtitle.idFoodTitle');
		return $this->db->get_where('foodmenufoodtitle', array('idFoodMenu' => $idfoodmenu));
	}

}