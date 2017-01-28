<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProcessUser extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model("User");
        $this->load->model("UserClient");
        $this->load->library('cart');
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

	public function agregar_carrito() {
		$id = $this->input->post("id");
		$cantidad = $this->input->post("cantidad");
		$nombre = $this->input->post("nombre");
		$precio = $this->input->post("precio");
		$imagen = $this->input->post("imagen");

		$data = array(
            'id'      => $id,
            'qty'     => $cantidad,
            'price'   => $precio,
            'name'    => $nombre,
            'options' => array('image' => $imagen)
		);

		$this->cart->insert($data);

	}

	public function logout() {
		if($this->session->userdata('user_logged_in') == TRUE) 
			$this->session->set_userdata('user_logged_in', FALSE);

		header("Location: " . base_url());
	}
  
}
