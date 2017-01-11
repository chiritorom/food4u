<?php

class UserAdmin extends CI_Model {

	public function findByUserNameAndPassword($username = "", $password = "") {
		$result = $this->db->get_where('useradmin', array('username' => $username, 'password' => $password), 1);
        return $result->row();
	}

}
