<?php

class UserClient extends CI_Model {

	public function findAll() {
		$this->db->from('userclient');
		$this->db->join('user', 'userclient.idUser = user.idUser');
		return $this->db->get();
	}

	public function findByEmail($email = "") {
		$this->db->select('*, DATE_FORMAT(birthday,"%d/%m/%Y") as birthday');
        $this->db->from('user');
		$this->db->join('userclient', 'userclient.idUser = user.idUser');
		$this->db->where(array('user.email' => $email));
		$result = $this->db->get();
		return $result->row();
	}

	public function addUserClient($idUser, $password) {
		$data = array(
				'idUser' => $idUser,
				'password' => $password
			);
		$this->db->insert('userclient', $data);
	}
	public function updateUserClient($dataUser) {
		$data1 = array(
			'firstName' => $dataUser['nombre'],
			'primaryLastName' => $dataUser['apaterno'],
			'secondLastName' => $dataUser['amaterno'],
			'email' => $dataUser['email']
		);

		$data2 = array(
			'idGender' => $dataUser['genero'],
			'birthday' => $dataUser['fecha'],
			'mobile' => $dataUser['movil']
		);

		if(!$this->findByEmail($dataUser['email']) || ($dataUser['email'] == $this->session->userdata('user_email'))):
			$this->db->set($data1);
			$this->db->where('idUser', $dataUser['idUser']);
			$this->db->update('user');

			$this->db->set($data2);
			$this->db->where('idUser', $dataUser['idUser']);
			$this->db->update('userclient');

			echo "Datos actualizados correctamente.";
		else:
			echo "Este email ya existe.";
		endif;
	}

}
