<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DSLM_Controller extends CI_Controller{
	
	/**
	 * __construct()
	 * 
	 * Funcion constructor, ejecuta el constructor padre
	 * y carga las bibliotecas y helpers necesarios para el inicio
	 */
	public function __construct(){
		//Ejecuta el constructor del padre
		parent::__construct();
		//Carga las bibliotecas, helpers, y archivo de configuración
		$this->config->load('diccionario');
		$this->load->library('form_validation');
		$this->load->helper(array(
									'form',
									'url',
									'file',
									'security'
								));
		//Biblioteca de utilidades para adminsitración de base de datos
		$this->load->dbutil();
		//Llama el método init() que efectua el procesos de arranque del sistema
		//Define los delimitadores para los mensajes de error de todo el sistema
		$this->form_validation->set_error_delimiters('<p class="text-danger text-left">','</p>');
		//Carga los archivos de lenguaje
		$this->lang->load('diccionario_message_lang', 'spanish');
		$this->init();
	}
	
	
	/**
	 * init()
	 * 
	 * Metodo que efectua efectua el procesos de arranque del sistema.
	 * 
	 */
	public function init(){
		/**
		 * Queda pendiente el instalador y pasamos directamente al diccionario
		 */
		//Verifica si el sistema ya fue instalado
		/*if(read_file('install.txt') === FALSE ){
			//Aun no ha sido instalado el sistema
			redirect('instalador');
		}else{
			//El sistema ya fue instalado y lee el archivo de configuración
			$string_install = read_file('install.txt');
			//$var_install = json_decode($string_install,TRUE);
			//echo $var_install['is_installed'];

		}*/
		//redirect('diccionario');
	}
	
	
}