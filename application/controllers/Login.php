<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Clase_Administrador');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data['include_js'] =  array('login.js');
		$this->load->view('login.php');
		$this->load->view('footer',$data);
	}
	public function Loguearse()
	{	
		//echo json_encode(array('error'=> true,'mensaje'=> validation_errors()));
		try{
		if ($this->input->post()) {
			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');	
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_message('required', 'El Campo {field} es requerido.');
			$this->form_validation->set_message('valid_email', 'Campo {field} formato incorrecto .');
			if ($this->form_validation->run() == FALSE)
			{
					echo json_encode(array('error'=> 'CHUALO','mensaje'=> validation_errors()));
					$this->index();/*Si no*/
					//$this->load->view('login.php');
					// $this->load->view('footer');
					//$this->load->view('myform');
			}
			else
			{
				$acceso	 	=	$this->Clase_Administrador->login(strtoupper($this->input->post('email')), $this->input->post('password'));
				if ($acceso) {
							/*si existe*/
					$sessiondata = array(
						'nombre_usuario'                 =>	'Administrador',
						'logged_in'                =>	true
					);
					//echo json_encode(array('error'=> true,'mensaje'=> validation_errors()));
					$this->session->set_userdata($sessiondata);
					$this->load->view('header');
					$this->load->view('menu_administrador');
		
					$this->load->view('footer');
					/*si existe*/
				}
				else{
					$this->index();
				}
			}
			//echo json_encode(array('error'=> 'SI MANDA','mensaje'=> validation_errors()));
		}
		else{
			$this->index();
		}
		}
		catch(Exception $e){
			//$this->load->view('portada/index.php');
			echo json_encode(array('error'=> $e,'mensaje'=> validation_errors()));
		}
		

		//$this->form_validation->set_message('is_unique', 'El Nombre registrado en el campo {field} ya existe.');
		/*
		$this->form_validation->set_rules('selectTipoTercero[]', 'Tipo Tercero', 'trim|xss_clean|required');
			foreach ($this->input->post('selectTipoTercero') as $key) {
				if ($key == 2) {
					$this->form_validation->set_rules('txtGiro', 'Giro', 'trim|xss_clean|required');			
					break;
				}
			}
		*/
	

		
	}
	public function desloguearse(){
		if($this->session->userdata('logged_in')) {
			unset($_SESSION);  
			session_destroy();
			redirect('','refresh');
		}else{
			redirect('','refresh');
		}
	}
}
