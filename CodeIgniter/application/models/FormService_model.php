<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormService_model extends CI_Model {
	function __construct(){
		 parent::__construct();
		 $this->load->database();
	}

	function crearArchivo($info){
		$this->db->insert('encabezado_archivo',array(
			'nombreArchivo' => $info['nombreArchivo'],
			'numeroDeFilas' => $info['numeroDeFilas'],
			'id_entidadPago' => $info['id_entidadPago'],
			'totalRecaudado' => $info['totalRecaudo'],
			'fechaHora' => $info['fecha']
		));
	}

}

?>