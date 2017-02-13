<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model("plate");
        $this->load->model("UserClient");
        $this->load->model("Gender");
        $this->load->library('cart');
        $this->load->model("foodMenu");
    }

	public function page($url = "inicio") {

		if($this->page->findByUrl($url)):

			$result1 = $this->page->findByUrl($url);
			$result2 = $this->page->findAll();
			$result3 = $this->data->findByPage($url);
			$result4 = $this->plate->findAll();
			$result5 = "";
			$result6 = $this->Gender->findAll();
			$result7 = $this->foodMenu->findAll();

			if($this->session->has_userdata('user_logged_in') && $this->session->userdata('user_logged_in') == TRUE):
				$result5 = $this->UserClient->findByEmail($this->session->userdata('user_email'));
			endif;
			

			$data = array(
				"title" => $result1->name,
				"findAll" => $result2,
				"findByPage" => $result3,
				"findAllPlate" => $result4,
				"userData" => $result5,
				"findAllGender" => $result6,
				"findAllFoodMenu" => $result7
			);
			
			$this->load->view('page_template_view', $data);
		else:
			$this->load->view('404');
		endif;
	}

	public function nuestros_platos($plate = "") {
		$this->load->helper('form');
		$this->load->model('plate');

		if($this->plate->findByUrl($plate)):

			$result1 = $this->plate->findAll();
			$result2 = $this->page->findAll();
			$result3 = $this->plate->findByUrl($plate);

			$data = array(
				'findAllPlate' => $result1,
				'findAll' => $result2,
				'title' => 'Nuestros platos',
				'dataPlate' => $result3
			);

			$this->load->view('plate_view', $data);
		else:
			$this->load->view('404');
		endif;
	}
	
}
