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


    public function consultarUsuario()
    {
        try {
            $formato = $this->modulo->getFormato('usuario');
            $model   = $this->modulo->getFormatoModel($formato);
            $cols    = $this->modulo->getFormatoConsultaCols($formato);


            $this->paginacion->setTotal($model->countAll());
            $limit = $this->paginacion->getLimit();
            $entities = $model->findAll($limit[1], $limit[0]);
            $this->load->view('formato/consultar', [
                'formato' => $formato,
                'entities'=> $entities,
                'cols'    => $cols,
                'paginacion' => $this->paginacion->paginacion($this->load)
            ]);
        }catch(Exception $e){
            //TODO si no existe el formato
            k($e->getMessage());
        }
    }
}
?>
