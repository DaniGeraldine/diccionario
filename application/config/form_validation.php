<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Archivo con las reglas de validación para el sistema
 */
 $config = array(
 	'login/validate' => array(
		array(
			'field' => 'username',
			'label' => 'User Name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required'
		)		
	),
 
 	'instalador/form' => array(
		array(
			'field' => 'hostname',
			'label' => 'Hostname',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'username',
			'label' => 'User Name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim'
		),
		array(
			'field' => 'database_name',
			'label' => 'Database Name',
			'rules' => 'trim|required'
		)						
	)
 
 );
 
 
 
