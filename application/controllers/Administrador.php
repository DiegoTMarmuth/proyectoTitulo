<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Clase_Subir_Archivo');
		$this->load->model('Clase_Administrador');
	}
	public function index()
	{
		$this->load->view('portada/index.php');
	}
	public function galeria()
	{
		$data['galeria'] =   $this->Clase_Subir_Archivo->mostrar_imagenes_carrusel();
		$this->load->view('portada/galeria.php',$data);
	}

	public function administrar_pagina_inicial()
	{
		//$this->load->view('welcome_message');
		if($this->session->userdata('logged_in')) {
			$data['menu']  =  'Inicio';
		$data['submenu']  =  'PaginaI';
		$data['include_js'] =  array('pagina_inicial.js');
		$data['carrusel'] =   $this->Clase_Subir_Archivo->mostrar_imagenes_carrusel();
		$this->load->view('header');
		$this->load->view('menu_administrador',$data);
		$this->load->view('Administrador/administrar_pagina_inicial',$data);
		$this->load->view('footer',$data);
		}
		else{
			redirect('','refresh');

		}
	
	}

	public function administrar_galeria()
	{
		//$this->load->view('welcome_message');
		if($this->session->userdata('logged_in')) {
			$data['galeria'] =   $this->Clase_Subir_Archivo->mostrar_galeria();
		$data['menu']  =  'Inicio';
		$data['submenu']  =  'PaginaG';
		$data['include_js'] =  array('galeria.js');
		$this->load->view('header');
		$this->load->view('menu_administrador',$data);
		$this->load->view('Administrador/administrar_galeria',$data);
		$this->load->view('footer',$data);
		}
		else{
			redirect('','refresh');

		}
	
	}

	public function proyectos()
	{
		if($this->session->userdata('logged_in')) {
		$data['menu']  =  'Inicio';
		$data['submenu']  =  'PaginaG';
		$data['include_js'] =  array('proyectos.js');
		$this->load->view('header');
		$this->load->view('menu_administrador',$data);
		$this->load->view('Administrador/proyectos');
		$this->load->view('footer',$data);
		}
			else{
				redirect('','refresh');

			}
	}
	public function informe_dispositivos()
	{
		//$this->load->view('welcome_message');
		if($this->session->userdata('logged_in')) {
		$data['menu']  =  'Inicio';
		$data['submenu']  =  'PaginaG';
		$data['include_plugin'] = array("chartjs/Chart.js","chartjs/Chart.min.js");
		$data['include_js'] =  array('informeDispositivos.js');
		$años= $this->Clase_Administrador->obtenerActividadDispositivos();
		//echo $date->format('Y-m-d H:i:s');
		$Fechas=array();
		foreach ($años as $key => $value) {
			
			array_push($Fechas,$value['Fecha_Actividad']);

			$oldDate = strtotime($value['Fecha_Actividad']);

			$newDate = date('Y-m-d',$oldDate);

			//print_r(gettype($newDate));
		}
		print_r($Fechas);
		
		$data['Fechas']=$Fechas;
		$this->load->view('header');
		$this->load->view('menu_administrador',$data);
		$this->load->view('Administrador/informe_dispositivos',$data);
		$this->load->view('footer',$data);
		}
		else{
			redirect('','refresh');

		}
	}

	public function get_imagenes()
	{
		//$this->load->view('welcome_message');
	
		if($this->session->userdata('logged_in')) {
		$data['menu']  =  'Inicio';
		$data['submenu']  =  'PaginaG';
		$data['include_plugin'] = array("chartjs/Chart.js","chartjs/Chart.min.js");
		$data['include_js'] =  array('administrador.js');
		$this->load->view('header');
		$this->load->view('menu_administrador',$data);
		$this->load->view('Administrador/informe_dispositivos');
		$this->load->view('footer',$data);
		}
		else{
			redirect('','refresh');

		}
	}

	public function getTablaProyectos()
	{
		//$this->load->view('welcome_message');
	
		$resultado=$this->Clase_Administrador->obtenerProyectos();
		echo json_encode($resultado);
	}

	public function getAniodispositivos()
	{
		//$this->load->view('welcome_message');
		$date = new DateTime('2000-01-01');
		echo $date->format('Y-m-d H:i:s');
		$resultado=$this->Clase_Administrador->obtenerProyectos();
		
		echo json_encode($resultado);
	}
	public function getDatosGrafico()
	{
		$dia=$this->input->post('dia');
		$resultado=$this->Clase_Administrador->obtenerEstadoDia($dia);
		//$resultado=$this->Clase_Administrador->obtenerActividadDispositivos();
		
		echo json_encode($resultado);
	}

	public function GraficarMeses()
	{
		$Meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
       'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
		//Llega como numero y lo comparo con el array de meses
		$mesindicado=$this->input->post('mes');
		
		print_r($mesindicado);
		$data['menu']  =  'Inicio';
		$data['submenu']  =  'PaginaG';
		$data['include_plugin'] = array("chartjs/Chart.js","chartjs/Chart.min.js");
		$data['include_js'] =  array('administrador.js');
		
		//$resultado=$this->Clase_Administrador->obtenerEstadoMes($mes);
		$this->load->view('header');
		$this->load->view('menu_administrador',$data);
		$this->load->view('Administrador/informe_dispositivos');
		$this->load->view('footer',$data);
	}
	public function GraficarDia()
	{
		//Llega como numero y lo comparo con el array de meses
		$dia=strval($this->input->post('dia'));
		$dt = new DateTime($dia);
        $dia=$dt->format('Y-m-d');

		$data['menu']  =  'Inicio';
		$data['submenu']  =  'PaginaG';
		$data['include_plugin'] = array("chartjs/Chart.js","chartjs/Chart.min.js");
		$data['include_js'] =  array('informeDispositivos.js');
		/*$f = explode('/',$dia);
		
		$Fechabuena=$f[12."/".$f[0]."/".$f[1];
		*/
		
		$resultado=$this->Clase_Administrador->obtenerEstadoDia($dia);
		print_r($resultado);
		$this->load->view('header');
		$this->load->view('menu_administrador',$data);
		$this->load->view('Administrador/informe_dispositivos');
		$this->load->view('footer',$data);
		//print_r($resultado);

		echo json_encode($resultado);
	}

}
