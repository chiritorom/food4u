<?php

class User extends CI_Model {

	public function findByEmail($email = "") {
		$result = $this->db->get_where('user', array('email' => $email), 1);
        return $result->row();
	}

	public function findByEmailAndPassword($email, $password) {

		$this->load->library('encrypt');

		$this->db->from('user');
		$this->db->join('userclient', 'userclient.idUser = user.idUser');
		$this->db->where(array('user.email' => $email));
		$result = $this->db->get();
		$data = $result->row();
		
		if($result->num_rows() > 0 && ($this->encrypt->decode($data->password) == $password)) 
			return true;
		else 
			return false;
		
	}

	public function addUser($email = "") {

		if(!$this->findByEmail($email)):
			$data = array(
		        'email' => $email
			);

			$this->db->insert('user', $data);

			return true;
		else:
			return false;
		endif;
	}

}
