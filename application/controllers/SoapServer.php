<?php
class Soapserver extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        //cargar clases
   
        //cargar libreria
        require_once(str_replace("\\","/",APPPATH).'libraries/nusoap/nusoap.php');
        //$this->load->library("Nusoap_library"); //cargando mi biblioteca
        $this->nusoap_server = new soap_server();
        $this->nusoap_server->configureWSDL("SOAP Server", "urn:MySoapServer");
        //registrando funciones
        $input_array = array ('a' => "xsd:string", 'b' => "xsd:string");
        $return_array = array ("return" => "xsd:string");
        //$this->nusoap_server->register(
        //    "InsertarEstado", array('descripcion' =>'xsd:string','estado' =>'xsd:string','FechaActual' =>'xsd:string'), array("return" => "xsd:string"), "urn:MySoapServer");  
        $this->nusoap_server->register(
                "InsertarEstado", array('descripcion' =>'xsd:string'), array("return" => "xsd:string"), "urn:MySoapServer");  
      
                //$CI =& get_instance();
//$CI->load->model('usuario');

//$usuario = $CI->usuario->login($usuario, $password);
            }

    function index()
    {
        function InsertarEstado($desc)
        {
            /*
            (ver si hay )
            Servidor cada 1:01 min  ve el registro de todos  

            ALERTA de DESCONEXION DEL dispositivo a el proyecto
            
            si se cae el proyecto no recibo estado activo.
            
            
            si (fecha actual-1==Fecharecuperada)
            mientras el ultimo estado sea x y el nuevo estado sea x+1 
            ingreso estado 
            sino
            ingresar la hora y el estado desconectado.
            mandar alerta de desconexión 
            */
            
            $CI =& get_instance();
            $CI->load->model('Clase_Administrador');
            $resultado = $CI->Clase_Administrador->ingresarEstado($desc);
            //recuperar estado
            //$resultado=$this->Clase_Administrador->ingresarEstado($desc);

            //$resultadito="el dispositivo ".$desc ." Fecha disponible ".$FecI;

        	return json_encode($resultado);
        }
        function verificarEstado($desc)
        {
   
            $CI =& get_instance();
            $CI->load->model('Clase_Administrador');
            $resultado = $CI->Clase_Administrador-> ultimoEstado();
        	return json_encode($resultado);
        }

        $this->nusoap_server->service(file_get_contents("php://input"));
    }
}