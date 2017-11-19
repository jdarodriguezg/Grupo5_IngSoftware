<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
  function __construct(){
  	parent::__construct();
  	$this->load->helper('form');
  	$this->load->model('LoginService_model');
  }
	function index()
	{
		$this->load->library('recaptcha');
		$data['message'] = '';
		$this->load->view('headers');
		$this->load->view('inicioSesion/sesionBody',$data);
	
	}

	public function validar(){
		$this->load->library('recaptcha');
		
		$captcha_answer = $this->input->post('g-recaptcha-response');
		$response = $this->recaptcha->verifyResponse($captcha_answer);

		return $response['success'];
	}



	public function capturarDatosSesion()
 	{
  		$responseCaptcha = TRUE;
        $this->load->library('recaptcha');
        
        $username = $this->input->post('username');
   	    $password = $this->input->post('password');
 	    
 	    $info = array(
          'username' => $username,
          'password' => $password
  		);

  			$data['message'] = '<div class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px; "> Credenciales no validas </div>';
  

  		$resultado = $this->LoginService_model->iniciarSesion($info);

        if($resultado && $responseCaptcha){
            $data = array('username' => $username);          
            $this->session->set_userdata($data);
            
            $this->load->view('panelPrincipal/header');       
   			$this->load->view('panelPrincipal/mainMenu');
   			$this->load->view('panelPrincipal/principal');
   			$this->load->view('panelPrincipal/footer');
        }else {
      		$this->load->view('headers');
     		 $this->load->view('inicioSesion/sesionBody', $data);
     } 
  
 }

}
