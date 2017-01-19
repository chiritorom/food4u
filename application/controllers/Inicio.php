<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model("plate");
        $this->load->model("UserClient");
        $this->load->model("Gender");
        $this->load->library('cart');
    }

	public function page($url = "inicio") {

		if($this->page->findByUrl($url)):

			$result1 = $this->page->findByUrl($url);
			$result2 = $this->page->findAll();
			$result3 = $this->data->findByPage($url);
			$result4 = $this->plate->findAll();
			$result5 = "";
			if($this->session->has_userdata('user_logged_in') && $this->session->userdata('user_logged_in') == TRUE):
				$result5 = $this->UserClient->findByEmail($this->session->userdata('user_email'));
			endif;
			$result6 = $this->Gender->findAll();

			$data = array(
				"title" => $result1->name,
				"findAll" => $result2,
				"findByPage" => $result3,
				"findAllPlate" => $result4,
				"userData" => $result5,
				"findAllGender" => $result6
			);
			
			$this->load->view('page_template_view', $data);
		else:
			$this->load->view('404');
		endif;
	}
	
}
