<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends DSLM_Controller{
	
	
	public function __construct(){
		parent::__construct();
		$this->load->model('user');
	}
	
	public function index(){
		$data = array(
			'head' => $this->load->view('system/head',NULL,TRUE),
			'header' => '',
			'navbar' => $this->load->view('system/navbar',NULL,TRUE),
			'content' => $this->load->view('login/form',NULL,TRUE),
			'footer' => $this->load->view('system/footer',NULL,TRUE)
		);
		$this->load->view('system/layout',$data);
	}
	
	
	public function validate(){
		$username = xss_clean($this->input->post('username'));
		$password = do_hash(xss_clean($this->input->post('password')),'md5');
		if($this->form_validation->run() === FALSE){
			$this->index();
		}else{
			$is_register = $this->user->is_register(array(
				'username' => $username,
				'password' => $password
			));
			if($is_register)
				redirect('dashboard');
			else
				echo "Usuario no registrado";
		}
		
	}
}