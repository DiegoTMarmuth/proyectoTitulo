<?php 

/**
* 
*/
class Clase_Subir_Archivo extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function subir_imagen_paginainicial($imagen)
	{
        $data =array(
            'Ruta' => $imagen,
            'Lugar' => 1
        );
        return $this->db->insert('imagenes',$data);
	}

    public function subir_imagen_galeria($imagen)
	{
        $data =array(
            'Ruta' => $imagen,
            'Lugar' => 0
        );
        return $this->db->insert('imagenes',$data);
	}
    public function mostrar_imagenes_carrusel()
	{
        $this->db->select();
		$this->db->from('imagenes');
        //$this->db->where('Ruta','Like' ,'%uploads%');
		$this->db->where('Lugar',1);
		$query = $this->db->get();
		return $query->result_array();
       
	}
	public function mostrar_galeria()
	{
        $this->db->select();
		$this->db->from('imagenes');
        //$this->db->where('Ruta','Like' ,'%uploads%');
		$this->db->where('Lugar',0);
		$query = $this->db->get();
		return $query->result_array();
       
	}
	
}

?>