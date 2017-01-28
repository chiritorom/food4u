<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model("UserAdmin");
        $this->load->model("Plate");
        $this->load->model("Page");
        $this->load->library("session");
    }

	public function index() {
		if($this->session->userdata('user_admin_logged_in') == TRUE):
			header("Location: admin/dashboard");
		else:
			$this->load->view('admin/login_f4u_view');
		endif;
	}
	
	public function login() {
		$username = $this->input->post("user");
		$password = $this->input->post("password");

		if($this->UserAdmin->findByUserNameAndPassword($username, $password)):
			$data = array(
				'user_admin_logged_in' => TRUE 
				);

			$this->session->set_userdata($data);
			echo "true";
		else:
			echo "false";
		endif;
	}

	public function logout() {

		if($this->session->userdata('user_admin_logged_in') == TRUE) {

			$this->session->set_userdata('user_admin_logged_in', FALSE);
			header("Location: " . base_url() . "f4u-admin");
		} else {
			$this->load->view("404");
		}
	}

	public function dashboard($page = "") {

		if($this->session->userdata('user_admin_logged_in') == TRUE) {

			$data = array(
				"page" => "Dashboard"
				);

			$this->load->view('admin/dashboard_view', $data);

		} else $this->load->view("404");
	}

	public function platos($plate = "") {

		if($this->session->userdata('user_admin_logged_in') == TRUE) {

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

	public function paginas($page = "") {
		if($this->session->userdata('user_admin_logged_in') == TRUE) {

			$result = $this->Plate->findAll();

			$data = array(
				"page" => "Platos",
				"findAllPlate" => $result
				);

			$this->load->view('admin/pages_view', $data);

		} else {
			$this->load->view("404");
		}
	}
}
