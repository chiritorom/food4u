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
		/* RECIBIR DATOS */
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$compassword = $this->input->post("compassword");

		$this->load->library('encrypt');

		if($this->User->addUser($email) == true && ($password == $compassword)):
			$data = array(
				'user_email' => $email,
				'user_logged_in' => TRUE 
				);

			$this->session->set_userdata($data);

			if($this->User->findByEmail($email)):
				$result1 = $this->User->findByEmail($email);

				$password = $this->encrypt->encode($password);

				$this->UserClient->addUserClient($result1->idUser, $password);
			endif;
			echo "true";
		else:
			echo "false";
		endif;
	}

	public function actualizar_usuario() {
		$dataUserClient = array(
			'idUser' => $this->input->post('id'),
			'nombre' => $this->input->post("nombre"),
			'apaterno' => $this->input->post("apaterno"),
			'amaterno' => $this->input->post("amaterno"),
			'genero' => $this->input->post("genero"),
			'fecha' => date("Y-d-m", strtotime($this->input->post("fecha"))),
			'movil' => $this->input->post("movil"),
			'email' => $this->input->post("email"),
			'lastEmail' => $this->session->userdata('user_email')
		);

		$this->UserClient->updateUserClient($dataUserClient);
		
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

	public function eliminar_item() {
		$id = $this->input->post("id");

		$data = array(
	        'rowid' => $id,
	        'qty'   => 0,
		);

		$this->cart->update($data);
	}

	public function actualizar_item() {
		$id = $this->input->post("id");
		$cantidad = $this->input->post("count");
		$nombre = $this->input->post("nombre");
		$precio = $this->input->post("precio");
		$imagen = $this->input->post("imagen");

		if($cantidad >= 1):
			$data = array(
		        'id' => $id,
		        'qty'   => $cantidad,
		        'price'   => $precio,
	            'name'    => $nombre,
	            'options' => array('image' => $imagen)
			);

			$this->cart->insert($data);
			echo "Agregado al carrito";
		else:
			echo "Ingrese una cantidad válida";
		endif;
	}

	public function logout() {
		if($this->session->userdata('user_logged_in') == TRUE) 
			$this->session->set_userdata('user_logged_in', FALSE);

		header("Location: " . base_url());
	}
  
}
