<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* Este controlador redirige a la página de Log In en caso de que el usuario no tenga sesión iniciada.
* Esto previene que el usuario pueda ver una página a la cual no tiene acceso.
*/
class MY_Controller extends CI_Controller
{
    /**
     * @var CI_Session
     */
    public $session;

    /**
     * @var MY_Loader
     */
    public $load;

    /**
     * @var CI_Form_validation
     */
    public $form_validation;
    /**
     * @var CI_Input
     */
    public $input;

    /**
     * @var Modulo
     */
    public $modulo;
    /**
     * @var Residente_helper
     */
    public $residente_helper;
    /**
     * @var Usuario_helper
     */
    public $usuario_helper;
    /**
     * @var Formato_helper
     */
    public $formato_helper;
    /**
     * @var Residente_model
     */
    public $residente_model;
    
	function __construct()
	{
        parent::__construct();
        
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation', [
            'error_prefix' => "", 'error_suffix' => ""
        ]);
        $this->load->library('modulo');
        $this->load->model('residente_model');
        
        $this->load->library('residente_helper');
        $this->load->library('usuario_helper');
        
        $this->load->library('formato_helper', [
            'form_validation' => $this->form_validation,
            'input' => $this->input,
            'session' => $this->session,
        ]);

        //TODO
        if(!isset($this->session->userdata['login']))
        {
            redirect('login');
        }
	}

    public function _remap($method, $params = array())
    {
        //validamos si es pagina para crud de un formato donde cambiamos al nombramiento default
        if($params && $this->modulo->formatoExiste($params[0])){
            $formato_key = $params[0];
            $method =  $method.ucfirst($formato_key);
            array_shift($params);
        }

        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        }
        show_404();
    }
    
    public function index()
    {
        redirect('/Welcome');
    }
}


?>