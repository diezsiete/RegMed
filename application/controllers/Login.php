<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Controlador para inicio de sesión.
 */
class Login extends CI_Controller
{

    /**
     * @var CI_Form_validation
     */
    public $form_validation;
    /**
     * @var CI_Input
     */
    public $input;
    /**
     * @var CI_Session
     */
    public $session;

    /**
     * @var Usuario_model
     */
    public $usuario_model;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->model('usuario_model');
        $this->load->library('encrypt');
    }

     /**
      * Función para navegar al login de usuario.
      * @return [type] [description]
      */
     public function index()
     {
          if(isset($this->session->userdata['login'])) 
              redirect('/welcome');
          else 
            $this->load->view('login/login');

     }
     /**
      * Función para validar información sumistrada de usuario y contraseña,
      * verifica si el usuario esta activo, en caso de cumplir condiciones inicia
      * sesión y guarda datos encriptados en las cookies.
      */
     public function login()
     {
         $this->form_validation->set_rules('username', 'Usuario', 'trim|required')
             ->set_rules('password', 'Contraseña', 'trim|required');
         $error_message = "";
         if($this->input->post('login')) {
             if ($this->form_validation->run()) {
                 $username = $this->input->post('username', true);
                 $password = $this->input->post('password', true);
                 if ($usuario = $this->usuario_model->login($username, $password)) {
                     $session = [
                         'id' => $usuario->id,
                         'email' => $usuario->email,
                         'nombre' => $usuario->nombre,
                         'rol'  => $usuario->rol_id,
                     ];
                     $this->session->sess_expire_on_close = 'true';
                     $this->session->set_userdata('login', $session);
                     redirect('welcome');
                 } else {
                     $error_message = 'Usuario o contraseña incorrecto';
                 }
             } else
                 $error_message = 'Por favor introduzca usuario y contraseña';
         }

         $this->load->view('login/login', ['error_message' => $error_message]);
   }

     /**
      * Función para cerrar la sesión activa de un usuario,limpia cookies y termina
      * sesión.
      */
     public function logout()
     {
         $this->session->unset_userdata('login');
         $data['success_message'] = 'Sesión cerrada exitosamente';
         $this->session->sess_destroy();
         $this->load->view('login/login', $data);
     }

}

?>