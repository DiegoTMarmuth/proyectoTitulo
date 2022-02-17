<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subir_archivos extends CI_Controller {
   
    public function __construct() {
		parent::__construct();
        $this->load->model('Clase_Subir_Archivo');
        $this->load->helper(array('form', 'url'));
        

	}


    public function subir_imagen_pagina_inicial()
	{
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        /*si no es un archivo se carga la pagina denuevo*/
        if ( !$this->upload->do_upload('Imagen'))
        {
                $error = array('error' => $this->upload->display_errors());

             
                $this->load->view('header');
                $this->load->view('menu_administrador');
                $this->load->view('nueva/index.php');
                $this->load->view('footer',$error);
        }
           /**Si es un archivo se procede a guardar en el modelo  */
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $file_info   = $this->upload->data();
                $imagen   =     "assets/uploads/".$file_info['file_name'];
                $subir =   $this->Clase_Subir_Archivo->subir_imagen_paginainicial($imagen);
        }
   
		
	}

    public function subir_imagen_galeria()
	{
      
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        /*si no es un archivo se carga la pagina denuevo*/
        if ( !$this->upload->do_upload('Imagen'))
        {
                $error = array('error' => $this->upload->display_errors());

             
                $this->load->view('header');
                $this->load->view('menu_administrador');
                $this->load->view('nueva/index.php');
                $this->load->view('footer',$error);
                
                
        }
           /**Si es un archivo se procede a guardar en el modelo  */
        else
        {
                
                $data = array('upload_data' => $this->upload->data());
                $file_info   = $this->upload->data();
                $imagen   =    "assets/uploads/".$file_info['file_name'];
                $subir =   $this->Clase_Subir_Archivo->subir_imagen_paginainicial($imagen);
        }
   
		
	}

        public function mostrar_imagenes_PaginaInicial()
	{
        $data['carrusel']=$this->Clase_Subir_Archivo->mostrar_paginaInicial();
        
		echo json_encode($data);
                $this->load->view('header');
                $this->load->view('menu_administrador',$data);
                $this->load->view('Administrador/administrar_pagina_inicial',$data);
                $this->load->view('footer');
	}

    public function mostrar_imagenes_galeria()
	{
        $data['galeria']=$this->Clase_Subir_Archivo->mostrar_galeria();
        
		echo json_encode($data);
                $this->load->view('header');
                $this->load->view('menu_administrador',$data);
                $this->load->view('Administrador/administrar_galeria',$data);
                $this->load->view('footer');
	}
       

    public function mostrarImagen_Proyecto()
	{
                $config['upload_path']          = './uploads/galeria';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
        
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $data = array('upload_data' => $this->upload->data());
                $file_info   = $this->upload->data();
                
                $data['menu']  =  'Inicio';
                $data['submenu']  =  'PaginaI';
                $imagen   =    "uploads/galeria".$file_info['file_name'];

                
                print_r($imagen);
	}



}

?>