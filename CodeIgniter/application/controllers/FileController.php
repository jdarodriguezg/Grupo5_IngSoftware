<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class FileController extends CI_Controller {

	function __construct(){
  		parent::__construct();
  		$this->load->helper('form');
  		$this->load->model('FileService_model');
  		$this->load->library('upload');
  	}

  	function index(){

  		$data['entidades'] = $this->FileService_model->obtenerEntidades();
  		$data['error'] = '';

  		$this->load->view('panelPrincipal/header');
  		$this->load->view('panelPrincipal/MainMenu');
  		$this->load->view('formularioArchivo/formulario',$data);
  		$this->load->view('panelPrincipal/footer');
  	}

  	  public function obtenerDatos(){
  				//	$ruta = base_url().'uploads/';
  		 		//	$config['upload_path'] =  str_replace('/', '\\', $ruta);
  	  			$idEntidad = $this->input->post('identidad');

  				$config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'csv';

                $this->load->library('upload');
              	$this->upload->initialize($config,true);


                if ( ! $this->upload->do_upload('userfile'))
                {
                    $this->mostrarResultadoErroneo();
                   
                }
                else
                {
                    $this->mostrarResultadoExitoso($idEntidad);  
                	
                }
    
		}

		private function mostrarResultadoErroneo()
		{
			  $errorConFormato = '<div class="callout callout-danger">
			  					<h4>Danger</h2>
			  					<p>
			  					'.$this->upload->display_errors().'
			  					</p>
			  					</div> ';
              $data = array(  'error' => $errorConFormato,
                    		  'entidades' => $this->FileService_model->obtenerEntidades());
                        $this->load->view('panelPrincipal/header');
  						$this->load->view('panelPrincipal/MainMenu');
                        $this->load->view('formularioArchivo/formulario', $data);
                        $this->load->view('panelPrincipal/footer');
		}


		private function mostrarResultadoExitoso($extra)
		{	
			   $info = $this->upload->data();
               $data = array('nombreArchivo' => $info['file_name'],
           					 'id_entidad' => $extra	);
      

               $this->analizarEstructura($data);       

		}

		private function analizarEstructura($data)
		{
			date_default_timezone_set('America/Bogota');			
			$fecha = date("Y-m-d\TH:i:sO");
			$path = base_url().'/uploads/'.$data['nombreArchivo'];
			$lineas = file($path);

			$i = 0;
			$error = 0;
			$upl =0;
			
			$j = 0; //contador actualizados
			$k = 0; //contador nuevos registros
			$valorTotalRecaudo = 0;
			

			foreach ($lineas as $filas => $valor) {
				$tmperror=0;
				if($i>=0){
					$f = explode(";", $valor);
					$cedula = trim($f[0]);
					$valorConsignado = trim($f[1]);
					$numeroReferencia = trim($f[2]);
					$codigoDeBarras = trim($f[3]);
					$fechaHoraRecaudo = trim($f[4]);					
					
					$data_links[$k] = array('Cedula' => $cedula,
										'ValorConsignado' => $valorConsignado,
										'NumeroDeReferencia' => $numeroReferencia,
										'CodigoDeBarras' => $codigoDeBarras,
										'FechaHoraRecaudo' => $fechaHoraRecaudo );
					

					$valorTotalRecaudo += $valorConsignado;
					$k++;
				}
				$i++;
			}
			$i--;

			$data_encabezado = 	array('id_entidadPago' => $data['id_entidad'],
								'Nombre_Archivo' => $data['nombreArchivo'],
								'NumeroDeFilas_Archivo' => $k,
								'TotalRecaudado_Archivo' => $valorTotalRecaudo,
								'FechaHora_Archivo' => $fecha);

			$idEncabezado = $this->FileService_model->subirEncabezado($data_encabezado);


			foreach ($data_links as $var => $value) {
				$value['Id_Encabezado_Archivo'] = $idEncabezado;
				$this->FileService_model->subirArchivos($value);
			}

			$arrayPresentacion =  array('nombre del archivo' => $data_encabezado['Nombre_Archivo'],
										'numero de filas' => $data_encabezado['NumeroDeFilas_Archivo'],
										'total recaudado' => $data_encabezado['TotalRecaudado_Archivo'],
										'fecha de carga' => $data_encabezado['FechaHora_Archivo']);
									
			$todo['data_encabezado'] = $arrayPresentacion;


			$this->load->view('panelPrincipal/header');
  			$this->load->view('panelPrincipal/MainMenu');
            $this->load->view('formularioArchivo/upload_success',$todo);
            $this->load->view('panelPrincipal/footer');


		}


		private function enviarEmail()
		{

		}


	/*public function cargarArchivo() {

		if ($_FILES["userfile"]["error"] > 0)
 		{
  			echo "Error: " . $_FILES["userfile"]["error"] . "<br>";
 		}
		else
  		{
  				echo "Upload: " . $_FILES["userfile"]["name"] . "<br>";
  				echo "Type: " . $_FILES["userfile"]["type"] . "<br>";
  				echo "Size: " . ($_FILES["userfile"]["size"] / 1024) . " kB<br>";
  				echo "Stored in: " . $_FILES["userfile"]["tmp_name"];
  		}
	}
	*/
  
 

}
