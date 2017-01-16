<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProcessUser extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model("User");
    }

    public function usuario() {
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		if($this->User->findByEmailAndPassword($email, $password) == true):
			session_start();
			$_SESSION["UserClient"] = TRUE;
			echo "true";
		else:
			echo "false";
		endif;

	}

	public function agregar_nuevo_usuario() {
		$email = $this->input->post("email");
		
		$this->User->addUser($email);

	}

	public function logout() {
		session_start();
		if($_SESSION["UserClient"] == TRUE) $_SESSION["UserClient"] = FALSE;

		header("Location: " . base_url());
	}
  
}
