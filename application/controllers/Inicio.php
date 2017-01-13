<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model("plate");
    }

	public function page($url = "inicio") {

		if($this->page->findByUrl($url)):

			$result1 = $this->page->findByUrl($url);
			$result2 = $this->page->findAll();
			$result3 = $this->data->findByPage($url);
			$result4 = $this->plate->findAll();

			$data = array(
				"title" => $result1->name,
				"findAll" => $result2,
				"findByPage" => $result3,
				"findAllPlate" => $result4
			);
			
			$this->load->view('page_template_view', $data);
		else:
			$this->load->view('404');
		endif;
	}
	
}
