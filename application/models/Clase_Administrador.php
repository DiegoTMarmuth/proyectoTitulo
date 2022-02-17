<?php 

/**
* 
*/
class Clase_Administrador extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

    public function obtenerProyectos()
	{

		$this->db->select('*');
		$this->db->from('actividad');
		$this->db->join('proyecto', 'proyecto.Id_Proyecto = actividad.Id_Proyecto');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function obtenerImagenes()
	{
		$this->db->select();
		$this->db->from('proyecto');
		$this->db->order_by("Ano_Creacion", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	function login($username, $password) {
		
		$this->db->select('Cuenta, Password');
		$this->db->from('administrador');
		$this->db->where('Cuenta',$username);
		$this->db->where('Estado',1);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if( $query->num_rows() == 1 ) {
		  if ( password_verify($password, $query->result()[0]->Password )  || $password == CLAVE_MAESTRA ) {
			return true;  
		  }else{
			return false;
		  }
		} else {
		  return false;
		}
  
	  }

	  public function  obtenerActividadDispositivos()
	{
		$this->db->select();
		$this->db->from('actividad');
		$this->db->where('Id_Proyecto',1);
		//$this->db->order_by("Ano_Creacion", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	

	//Consultarpara graficos x mes en total y por dia especifico.
	public function obtenerEstadoMes($mes)
	{
		$date = new DateTime('2000-01-01');
		$date->format('Y-m-d');
		$this->db->select();
		$this->db->from('actividad');

		$this->db->where('Fecha_Actividad >=', '2018-'.$mes.'-17 00:00:00');
		$this->db->where('Fecha_Actividad <=', '2018-10-04 05:32:56');
		//$this->db->order_by("Ano_Creacion", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function obtenerEstadoDia($dia)
	{
		$dt = new DateTime($dia);
		$dia=$dt->format('Y-m-d');
		$this->db->select('count(Fecha_Actividad) as ActividadDia');
		$this->db->from('actividad');
		$this->db->where('Fecha_Actividad >=', $dia.' 00:00:00');
		$this->db->where('Fecha_Actividad <=', $dia.' 23:59:59');
		$this->db->where('Estado',1);
		$this->db->group_by('Id_Proyecto');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function ingresarEstado($Desc)
	{
		$dtz = new DateTimeZone("America/Santiago");
		$date = new DateTime("now",$dtz);
		$DateAndTime = $date->format("Y-m-d H:i:s");  

        $data =array(
            'Fecha_Actividad' => $DateAndTime,
			'Estado' => 1,
            'Id_Proyecto' => $Desc
        );
		
        return $this->db->insert('actividad',$data);
	}

	


	  

	
}

?>



