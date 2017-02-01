<?php

class UserAdmin extends CI_Model {

	public function findAll() {
		$this->db->from('useradmin');
		$this->db->join('user', 'useradmin.idUser = user.idUser');
		return $this->db->get();
	}

	public function findByUserNameAndPassword($username = "", $password = "") {
		$result = $this->db->get_where('useradmin', array('username' => $username, 'password' => $password), 1);
        return $result->row();
	}

}
