<?php

class User extends CI_Model {

	public function findByEmail($email = "") {
		$result = $this->db->get_where('user', array('email' => $email), 1);
        return $result->row();
	}

	public function findByEmailAndPassword($email = "", $password = "") {
		$this->db->from('user');
		$this->db->join('userclient', 'userclient.idUser = user.idUser');
		$this->db->where(array('user.email' => $email, 'userclient.password' => $password));
		$result = $this->db->get();

		if($result->num_rows() > 0) 
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
			session_start();
			$_SESSION["UserClient"] = TRUE;
			$_SESSION["UserEmail"] = $email;
			echo "true";
		else:
			echo "false";
		endif;
	}

}
