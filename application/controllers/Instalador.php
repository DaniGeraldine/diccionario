<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instalador extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array(
			'url',
			'form',
			'security',
			'file'
		));
		$this->load->library('form_validation');
		$this->load->dbutil();
		$this->load->dbforge();
		$this->form_validation->set_error_delimiters('<h6 class="text-danger text-left">','</h6>');
	}
	
	
	public function index(){
		$data['head'] = $this->load->view('system/head',NULL,TRUE);
		$data['head'] = $data['head'] . "<style>.container {max-width: 730px;}</style>";
		$data['header'] = $this->load->view('system/instalador/header',NULL,TRUE);
		$data['content'] = $this->load->view('system/instalador/content',NULL,TRUE);
		$data['footer'] = $this->load->view('system/instalador/footer',NULL,TRUE);
		$this->load->view('system/layout',$data);
	}
	
	public function form(){
		$hostname = xss_clean($this->input->post('hostname'));
		$username = xss_clean($this->input->post('username'));
		$password = xss_clean($this->input->post('password'));
		$database_name = xss_clean($this->input->post('database_name'));
		if($this->form_validation->run() === FALSE){
			$this->index();
		}else{
			var_dump($hostname);
			$config['hostname'] = 'localhost';
			$config['username'] = 'root';
			$config['password'] = '';
			$config['database'] = '';
			$config['dbdriver'] = 'mysqli';
			$config['dbprefix'] = '';
			$config['pconnect'] = FALSE;
			$config['db_debug'] = TRUE;
			$config['cache_on'] = FALSE;
			$config['cachedir'] = '';
			$config['char_set'] = 'utf8';
			$config['dbcollat'] = 'utf8_general_ci';
			var_dump($this->load->database($config));
			//Efectua la conexión a la base de datos
			if($this->load->database($config)){
			//Verifica si la base de datos existe
				/*if($this->dbutil->database_exists($database_name,TRUE)){
					$message = 'La base de datos ya existe';
					$btn_message = 'Regresar';
					$btn_url = 'instalador';				
				}else{//Si no existe crea la base de datos y el archivo de configuración
					if ($this->dbforge->create_database($database_name)){
			        	$message = 'La base de datos fue creada';
						$btn_message = 'Ir al Diccionario';
						$btn_url = base_url();
					}else{
						$message = "No se pudo crear la base de datos";
						$btn_message = 'Regresar';
						$btn_url = 'instalador';					
					}
				}*/
				echo "Efectuo la conexión a DB";
			}else{
				$message = 'No fue posible conectarse a la base de datos';
				$btn_message = 'Regresar';
				$btn_url = 'instalador';
			}
			$this->success(array(
				'hostname' => $hostname,
				'username' => $username,
				'password' => $password,
				'database_name' => $database_name,
				'message' => $message,
				'btn_message' => $btn_message,
				'btn_url' => $btn_url
			));
		}			
	}
	
	public function success($data){
		//Extraemos los datos del arreglo
		extract($data);
		/*foreach($data as $value){
			var_dump($value);
			echo base_url().'/assets/diccionario/install.txt';
			write_file(base_url().'/assets/diccionario/install.txt',$value,'x+');
		}*/
		$data['head'] = $this->load->view('system/head',NULL,TRUE);
		$data['head'] = $data['head'] . "<style>.container {max-width: 730px;}</style>";
		$data['header'] = $this->load->view('system/instalador/header',NULL,TRUE);
		$data['content'] = $this->load->view('system/instalador/content_success',array(
																					'message' => $message,
																					'btn_url' => $btn_url,
																					'btn_message' => $btn_message
																				 ),TRUE);
		$data['footer'] = $this->load->view('system/instalador/footer',NULL,TRUE);
		$this->load->view('system/layout',$data);
	}

	
	
}