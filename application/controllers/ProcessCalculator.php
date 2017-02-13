<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProcessCalculator extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model("foodItem");
        $this->load->model("foodMenuFoodTitle");
        $this->load->model("foodOption");
        $this->load->model("foodItemFoodOption");
    }

    public function food_item() {
    	$id = $this->input->post("id");
		$result1 = $this->foodItem->findByFoodMenu($id);

		echo "<option>Selecciona item</option>";
		foreach ($result1->result_array() as $food_item) {
			echo "<option data-menu='" . $id . "' value='" . $food_item["idFoodItem"] . "'>" . $food_item["description"] . "</option>";
		} 

	}

	public function food_title() {
		$id = $this->input->post("id");
		$id_menu = $this->input->post("id_menu");
		$result1 = $this->foodMenuFoodTitle->findByFoodMenu($id);
		$result2 = $this->foodOption->findAll();
		$result3 = $this->foodItemFoodOption->findByFoodItem();

		//ALGORITMO DEL CALCULADOR DE NUTRICIÓN
		foreach ($result1->result_array() as $food_title):
			echo '<label>' . $food_title["description"] . '</label>';

			foreach ($result2->result_array() as $food_option):
				$check = "";

				if($food_option["idFoodTitle"] == $food_title["idFoodTitle"]):
					foreach ($result3->result_array() as $food_item):
						if($food_item["idFoodOption"] == $food_option["idFoodOption"]):
							$check = "checked";
						endif;
					endforeach;

					echo '<input type="checkbox" name="option' . $food_option["idFoodOption"] . '" value="' . $food_option["idFoodOption"] . '"' . $check . '> <span>' . $food_option["description"] . '</span><br>';
				endif;
			endforeach;
			echo '<br>';
		endforeach;
	}

	public function food_custom() {

		if($this->input->post("custom")):
		    $data = json_decode($_POST["custom"]);
		    $id = $data->id;
		    foreach($id as $singular) {
		       print_r ($id);
		    }
	    endif;
	}
}
