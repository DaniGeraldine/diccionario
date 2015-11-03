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
			$this->success(array(
				'hostname' => $hostname,
				'username' => $username,
				'password' => $password,
				'database_name' => $database_name
			));
		}			
	}
	
	public function success($data){
		var_dump($data);
		//Extraemos los datos del arreglo
		extract($data);
		//Creamos el archivo de configuración del sistema
		write_file('install.txt','//Archivo de Instalación',"x+");
		/*foreach($data as $value){
			var_dump($value);
			echo base_url().'/assets/diccionario/install.txt';
			write_file(base_url().'/assets/diccionario/install.txt',$value,'x+');
		}*/
		$data['head'] = $this->load->view('system/head',NULL,TRUE);
		$data['head'] = $data['head'] . "<style>.container {max-width: 730px;}</style>";
		$data['header'] = $this->load->view('system/instalador/header',NULL,TRUE);
		$data['content'] = $this->load->view('system/instalador/content_success',NULL,TRUE);
		$data['footer'] = $this->load->view('system/instalador/footer',NULL,TRUE);
		$this->load->view('system/layout',$data);
	}

	
	
}