<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Clase_Administrador');
	

	}

	public function index()
	{
		//$this->load->view('welcome_message');
		//$this->load->view('header');
		$this->load->view('login.php');
		//$this->load->view('footer');
		
	}
	public function Loguearse()
	{
		$acceso	 	=	$this->Clase_Administrador->login(strtoupper($this->input->post('email')), $this->input->post('password'));
		if ($acceso) {
			$sessiondata = array(
				'nombre_usuario'                 =>	'Administrador',
				'logged_in'                =>	true
			);
			$this->session->set_userdata($sessiondata);
			redirect('welcome','refresh');
			/*si existe*/
		}
		else{
			 redirect('','refresh');/*Si no*/
		}
		
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
