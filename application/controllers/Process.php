<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model("UserAdmin");
        $this->load->model("Plate");
    }
	
	public function platos() {
    
    if($this->input->post("id")):
    $idPage = $this->input->post("id");
    
    $result = $this->Plate->findById($idPage);
    
    echo '<div class="form-plate">
            <div class="button-close">
              <a href=""><i class="fa fa-close" aria-hidden="true"></i></a>
            </div>

            <form action="">
              <div class="img-plate">
                <img src="' . base_url() . 'assets/images/this-week01.jpg" alt="">
                <div class="file">
                  <p>
                    Elegir archivo
                  </p>

                  <input type="file">
                </div>
              </div>

              <div class="content-form">
                <label for="">ID</label>
                <input type="text" value="' . $result->idPlate . '">
                <label for="">PRECIO</label>
                <input type="text" value="' . $result->price . '">
                <label for="">NOMBRE</label>
                <input type="text" value="' . $result->name . '">
                <label for="">URL</label>
                <input type="text" value="' . $result->url . '">
                <label for="">FECHA DE CREACIÓN</label>
                <input type="text" value="' . $result->date . '">
                <label for="">DESCRIPCIÓN</label>
                <textarea name="" id="" >' . $result->description . '</textarea>
                
                <button type="submit">Guardar</button>
                <button type="text">Cancelar</button> 
              </div>
            </form>
          </div>';
    else:
    echo "error";
        endif;
	}
	
	public function nuevo_plato() {
    
    
    echo '<div class="form-plate">
            <div class="button-close">
              <a href=""><i class="fa fa-close" aria-hidden="true"></i></a>
            </div>

            <form action="">
              <div class="img-plate">
                <img src="' . base_url() . 'assets/images/this-week01.jpg" alt="">
                <div class="file">
                  <p>
                    Elegir archivo
                  </p>

                  <input type="file">
                </div>
              </div>

              <div class="content-form">
								<label for="">NOMBRE</label>
                <input type="text" name="nombre">
                <label for="">PRECIO</label>
                <input type="text" name="precio">
                <label for="">DESCRIPCIÓN</label>
                <textarea name="descripcion"></textarea>
                
                <button type="submit">Agregar</button>
                <button type="text">Cancelar</button> 
              </div>
            </form>
          </div>';
	}
  
}
