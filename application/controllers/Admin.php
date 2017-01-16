<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model("UserAdmin");
        $this->load->model("Plate");
    }

	public function index() {
		session_start();
		if(isset($_SESSION['user_admin_state']) && $_SESSION['user_admin_state'] == TRUE)
			header("Location: admin/dashboard");
		else
			$this->load->view('admin/login_f4u_view');
	}
	
	public function login() {
		$username = $this->input->post("user");
		$password = $this->input->post("password");

		if($this->UserAdmin->findByUserNameAndPassword($username, $password)):
			session_start();
			$_SESSION['user_admin_state'] = TRUE;
			echo "true";
		else:
			echo "false";
		endif;
	}

	public function logout() {
		session_start();

		if(isset($_SESSION['user_admin_state']) && $_SESSION['user_admin_state'] == TRUE) {

			$_SESSION['user_admin_state'] = FALSE;
			header("Location: " . base_url() . "f4u-admin");
		} else {
			$this->load->view("404");
		}
	}

	public function dashboard($page = "") {
		session_start();

		if(isset($_SESSION['user_admin_state']) && $_SESSION['user_admin_state'] == TRUE) {

			$data = array("page" => "Dashboard");

			$this->load->view('admin/dashboard_view', $data);

		} else $this->load->view("404");
	}

	public function platos($plate = "") {
		session_start();

		if(isset($_SESSION['user_admin_state']) && $_SESSION['user_admin_state'] == TRUE) {

			$result = $this->Plate->findAll();

			$data = array(
				"page" => "Platos",
				"findAllPlate" => $result
				);

			$this->load->view('admin/plate_view', $data);

		} else {
			$this->load->view("404");
		}
	}
}
