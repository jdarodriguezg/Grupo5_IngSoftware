<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileService_model extends CI_Model {
	function __construct(){
		 parent::__construct();
		 $this->load->database();
	}

	function obtenerEntidades(){

		$query = $this->db->get("entidad_pago");
		
		if($query->num_rows() > 0 )
			return $query->result();
		else {
			return false;
		}	
	}

	function subirArchivos($data){
		$this->db->insert('detalle_archivo_entidad',$data);
	}

	function subirEncabezado($data){
		$this->db->insert('encabezado_archivo',$data);
		return $this->db->insert_id();
	}

}

?>