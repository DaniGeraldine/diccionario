<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * is_register($user)
	 * 
	 * Este método determina si lso datos del usuario estan registrados en la base de datos
	 * 
	 * @param array()  $user   User es una rreglo compuesto por:
	 * 								'username'   String
	 * 								'password'   String códificada en MD5
	 * @return boolean			Regresa FALSE si el usuario no esta registrado
	 * 							y TRUE si el usuario esta registrado
	 */						
	public function is_register($user){
		extract($user);
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get();
		$result = $query->result_array();
		if(empty($result))
			return FALSE;
		else
			return TRUE;
		
	}
	
}