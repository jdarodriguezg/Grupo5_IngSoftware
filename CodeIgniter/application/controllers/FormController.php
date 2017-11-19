<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormController extends CI_Controller {
  function __construct(){
  	parent::__construct();
  	$this->load->helper('form');
  	$this->load->model('FormService_model');
  }
	function index()
	{
		$this->load->view('headers');
		$this->load->view('helperbody');
	}

	public function recibirDatos()
	{
		$info = array(
			'nombreArchivo' => $this->input->post('nombreArchivo'),
			'numeroDeFilas' => $this->input->post('numeroFilas'),
			'id_entidadPago' => $this->input->post('idEntidad'),
			'totalRecaudo' => $this->input->post('totalRecaudado'),
			'fecha' => $this->input->post('fecha')
		);

		$this->FormService_model->crearArchivo($info);	
	}

}
