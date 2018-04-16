<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador para gestionar usuarios del sistema.
 */
class Usuario extends MY_Controller {

    /**
     * @var CI_Form_validation
     */
    public $form_validation;
    /**
     * @var CI_Input
     */
    public $input;

    /**
     * @var Usuario_model
     */
    public $usuario_model;

    /**
     * @var Modulo
     */
    public $modulo;

    /**
     * @var Paginacion
     */
    public $paginacion;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('form_validation', [
            'error_prefix' => "<p class='help-block'>", 'error_sufix' => '</p>'
        ]);
        $this->load->model('usuario_model');
        $this->load->helper('security');
        $this->load->helper('form_input');
        $this->load->library('modulo');
        $this->load->library('paginacion');

        //TODO
        //$this->modulo->esRolAcceso([1], ['agregarUsuario', 'verUsuarios', 'modificarUsuario', 'restaurarPass']);
    }
    

    /**
     * modificar la contraseña del usuario 
     */
    public function modificar_pass()
    {
        $this->form_validation->set_rules('passAct', 'Contraseña actual', 'trim|required')
            ->set_rules('passNuev', 'Nueva contraseña', 'trim|required')
            ->set_rules('passConf', 'Confirmar contraseña', 'trim|required');

        $vars = ['usu' => $this->session->userdata['login']['id']];

        if ($this->form_validation->run() == true) {
            if($this->input->post('passNuev',true) == $this->input->post('passConf',true)) {
                if($this->usuario_model->consPass($vars['usu'], $this->input->post('passAct'))) {
                    if($this->usuario_model->cambiarPass($vars['usu'], $this->input->post('passNuev',true)))
                        $vars['insert_message'] = "Se actualizó correctamente la contraseña";
                    else
                        $vars['error_message'] = "Error de actualización";
                }
                else
                    $vars['error_message'] = "La contraseña actual no es correcta";
            }
            else
                $vars['error_message'] = "La contraseña nueva y su confirmación no son iguales";
        }
        
        $this->load->view('usuario/modificar-pass', $vars);
    }


    public function crearUsuario()
    {
        $formato = $this->modulo->getFormato('usuario');
        $model = $this->usuario_model;
        $usuario_rol = $this->session->userdata['login']['rol'];
        $vars = $this->formato_helper->crear($model, $formato->consultar);

        $this->load->view('usuario/usuario_form', $vars + [
            'roles' => $model->obtenerRoles(true, $usuario_rol != 8),
            'formato' => $formato,
            'view' => false
        ]);
    }
    public function editarUsuario($id)
    {
        $formato = $this->modulo->getFormato('usuario');
        $model   = $this->modulo->getFormatoModel($formato);
        $entity  = $model->findById($id);
        $vars    = $this->formato_helper->actualizar($model, $entity, $formato->consultar);
        if(!$this->input->post('actualizar'))
            $model->entityToPost($entity);
        $this->load->view('usuario/usuario_form', $vars + [
            'formato' => $formato,
            'view' => false,
            'entity' => $entity,
            'roles' => $model->obtenerRoles(true, $this->session->userdata['login']['rol'] != 8),
        ]);
    }
    
    public function consultarUsuario()
    {
        $insert_message = '';
        if($restaurar_id = $this->input->post('restaurar')){
            $this->usuario_model->cambiarPass($restaurar_id, $restaurar_id);
            $insert_message = "Se actualizo correctamente la contraseña.";
        }
        $formato = $this->modulo->getFormato('usuario');
        $model   = $this->usuario_model;
        $cols    = $this->modulo->getFormatoConsultaCols($formato);


        $usuario_rol =  $this->session->userdata['login']['rol'];
        $this->paginacion->setTotal($usuario_rol == 8 ? $model->countAll() : $model->countAllExceptSuperadmin());
        $limit = $this->paginacion->getLimit();
        $entities = $model->findAll($limit[1], $limit[0], $usuario_rol != 8);
        
        $this->load->view('/usuario/consultar_usuario', [
            'formato' => $formato,
            'entities'=> $entities,
            'cols'    => $cols,
            'paginacion' => $this->paginacion->paginacion($this->load),
            'insert_message' => $insert_message
        ]);
    }
}
?>
