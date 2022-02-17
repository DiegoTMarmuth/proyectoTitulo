<?php 

class Servicio extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //require_once(str_replace("\\","/",APPPATH).'libraries/nusoap/nusoap.php');
        $this->load->library('Nusoap');
    }
public function index()
{ 
/* ************************************************** */
function login($usuario, $password){
$CI =& get_instance();
//$CI->load->model('usuario');

//$usuario = $CI->usuario->login($usuario, $password);

/* Implementación */

return "OK";
}
/* ************************************************** */
$soapclient = new soap_server;
//Deficiones
$ns=base_url()."servicio/";
$soapclient->configureWSDL('login', $ns);
//
$soapclient->wsdl->schemaTargetNamespace=$ns;
//parametros
$input = array('usuario' => 'xsd:string','password' => 'xsd:string');
$output = array('return' => 'xsd:string');
$soapclient->register('login', $input, $output, $ns);

//respuesta
if (isset($HTTP_RAW_POST_DATA)) {
$input = $HTTP_RAW_POST_DATA;
}else {
$input = implode("\r\n", file('php://input'));
}

$soapclient->service($input);
}

}