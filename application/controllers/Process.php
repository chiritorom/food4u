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
    $idPlate = $this->input->post("id");
    
    $result = $this->Plate->findById($idPlate);
    
    echo '<div class="form-plate">
            <div class="button-close">
              <a href=""><i class="fa fa-close" aria-hidden="true"></i></a>
            </div>

            <form action="">
              <div class="img-plate">
                <img src="' . base_url() . 'assets/images/this-week01.jpg" alt="">
                <div class="file">
                  <p>Elegir archivo</p>

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

            <form action="' . base_url() . 'process/agregar_nuevo_plato" method="POST" enctype="multipart/form-data">
              <div class="img-plate">
                <img src="' . base_url() . 'assets/images/this-week01.jpg" alt="">
                <div class="file">
                  <p>
                    Elegir archivo
                  </p>

                  <input type="file" name="imagen">
                </div>
              </div>

              <div class="content-form">
								<label for="">NOMBRE</label>
                <input type="text" name="nombre" required>
                <label for="">PRECIO</label>
                <input type="text" name="precio" required>
                <label for="">DESCRIPCIÓN</label>
                <textarea name="descripcion" required></textarea>
                
                <button type="submit">Agregar</button>
                <button type="text">Cancelar</button> 
              </div>
            </form>
          </div>';
	}

  public function agregar_nuevo_plato() {
    $nombre = $this->input->post("nombre");
    $precio = $this->input->post("precio");
    $descripcion = $this->input->post("descripcion");
   // $imagen = $this->input->post("imagen");

    $config['upload_path'] = './assets/images';
    $config['allowed_types'] = 'jpg|png';
    $config['max_size'] = '100';
    $config['max_width']  = '1024';
    $config['max_height']  = '768';


    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload("imagen")) {
      $error = array('error' => $this->upload->display_errors());

    } else {
      $data = array('upload_data' => $this->upload->data());
    }

    $imagen = $this->upload->data("file_name");

    $this->Plate->addPlate($nombre, $precio, $descripcion, $imagen);
  }

  public function eliminar_plato() {
    $idPlate = $this->input->post("id");
    
    $this->Plate->deletePlate($idPlate);
  }
  
}
