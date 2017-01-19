<?php

class UserClient extends CI_Model {

	public function findByEmail($email = "") {
		$this->db->select('*, DATE_FORMAT(birthday,"%d/%m/%Y") as birthday');
        $this->db->from('user');
		$this->db->join('userclient', 'userclient.idUser = user.idUser');
		$this->db->where(array('user.email' => $email));
		$result = $this->db->get();
		return $result->row();
	}

	public function addUserClient($idUser = "") {
		$data = array(
				'idUser' => $idUser
			);
		$this->db->insert('userClient', $data);
	}

}
