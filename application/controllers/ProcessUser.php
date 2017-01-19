<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProcessUser extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model("User");
        $this->load->model("UserClient");
        $this->load->library('session');
    }

    public function usuario() {
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		if($this->User->findByEmailAndPassword($email, $password) == true):
			$data = array(
				'user_email' => $email,
				'user_logged_in' => TRUE 
				);

			$this->session->set_userdata($data);

			echo "true";
		else:
			echo "false";
		endif;

	}

	public function agregar_nuevo_usuario() {
		$email = $this->input->post("email");
		
		$this->User->addUser($email);

		$result1 = $this->User->findByEmail($email);

		$this->UserClient->addUserClient($result1->idUser);

	}

	public function actualizar_usuario() {
		echo "actualizado";
		
	}

	public function logout() {
		session_start();
		if($this->session->userdata('user_logged_in') == TRUE) 
			$this->session->set_userdata('user_logged_in', FALSE);

		header("Location: " . base_url());
	}
  
}
