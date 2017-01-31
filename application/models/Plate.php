<?php

class Plate extends CI_Model {

	public function findAll() {
		$this->db->where(array('state' => 1));
		$this->db->order_by("idPlate", "desc");
		return $this->db->get('plate');
	}
	
	public function findById($id) {
		$result = $this->db->get_where('plate', array('idPlate' => $id), 1);
		return $result->row();
	}

	public function findByUrl($url) {
		$result = $this->db->get_where('plate', array('url' => $url), 1);
		return $result->row();
	}

	public function addPlate($nombre, $precio, $descripcion, $imagen) {
		$data = array(
		        'name' => $nombre,
		        'price' => $precio,
		        'description' => $descripcion,
		        'image' => $imagen,
		        'date' => date('Y-m-d H:i:s',now("America/Lima"))
		);

		$this->db->insert('plate', $data);
	}

	public function deletePlate($id) {
		$data = array(
		        'state' => 0,
		);

		$this->db->where('idPlate', $id);
		$this->db->update('plate', $data);
	}

	public function updatePlate($id, $nombre, $precio, $descripcion, $imagen) {
		$data = array(
		        'name' => $nombre,
		        'price' => $precio,
		        'description' => $descripcion
		);

		if($imagen != "") {
			$data['image'] = $imagen;
		}

		$this->db->where('idPlate', $id);
		$this->db->update('plate', $data);
	}

}
