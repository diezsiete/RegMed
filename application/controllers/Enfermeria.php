<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Clase controladora del módulo enfermería.
 */
class Enfermeria extends MY_Controller
{

    /**
     * @var Medicamento_model
     */
    public $medicamento_model;
    /**
     * @var E07_model
     */
    public $e07_model;

    /**
     * @var E07c_model
     */
    public $e07c_model;

    /**
     * @var Paginacion
     */
    public $paginacion;

    /**
     * Enfermeria constructor.
     */
    public function __construct()
    {
        date_default_timezone_set("America/Bogota");
        parent::__construct();
        
        $this->load->helper('html');
        $this->load->helper('security');
        $this->load->helper('date');

        $this->load->model('medicamento_model');
        $this->load->model('e07_model');
        $this->load->model('e07c_model');
        $this->load->helper('form_input');
        $this->load->library('paginacion');
      

        //$this->modulo->esRolAcceso([1, 2, 7]);
    }
    
    
    public function medicamento_crear()
    {
        $this->medicamento_model->setRules($this->form_validation);

        $vars = ['formato' => $this->modulo->getFormato('e07'), 'view' => false];
        if($this->input->post('crear')) {
            if ($this->form_validation->run()) {
                try {
                    $vars['medicamento'] = $this->medicamento_model->insert($this->input, $this->session->userdata('login')['id']);
                } catch (Exception $e) {
                    $vars['error_med_crear'] = $e->getMessage();
                }
            } else
                $vars['error_med_crear'] = "Error de validación, por favor verifique los campos";

        }
        $this->load->view('formato/e07_form', $vars);
    }
    
    public function crearE07()
    {
        $vars = $this->formato_helper->crear($this->e07_model);
        $vars['formato'] = $this->modulo->getFormato('e07');
        $vars['view'] = false;
        if($vars && isset($vars['entity'])){
            $e07 = $vars['entity'];
            $horas = explode(',', $this->input->post('horas'));
            $ok = false;
            foreach($horas as $hora)
                $ok = $this->e07_model->insertHora($e07->id, $e07->residente_cedula, $hora);
            if($ok){
                redirect('formato/consultar/e07');
            }
        }
        $this->load->view('formato/e07_form', $vars);
    }

    public function editarE07($id)
    {
        try {
            $formato = $this->modulo->getFormato("e07");
            $model   = $this->modulo->getFormatoModel($formato);
            $entity  = $model->findById($id);

            $vars    = $this->formato_helper->actualizar($model, $entity);
            if($vars && isset($vars['entity'])){
                $e07 = $vars['entity'];
                $horas = explode(',', $this->input->post('horas'));
                $ok = false;
                $this->e07_model->deleteHora($e07->id, $e07->residente_cedula);
                foreach($horas as $hora)
                    $ok = $this->e07_model->insertHora($e07->id, $e07->residente_cedula, $hora);
                if($ok){
                    redirect($formato->consultar);
                }
            }
            if(!$this->input->post('actualizar')) {
                $model->entityToPost($entity);
                if($medicamento = $this->medicamento_model->findByE07($entity)) {
                    $_POST['medicamento_id'] = $medicamento->id;
                    $vars['medicamento'] = $medicamento;
                }
                $_POST['horas'] = implode(",", $entity->horas);
            }


            $this->load->view('formato/'.$formato->key.'_form', $vars + [
                    'formato' => $formato,
                    'view' => false,
                    'entity' => $entity
                ]);
        }catch(Exception $e){
            //TODO si no existe el formato
            k($e->getMessage());
        }
    }


    public function consultarE07c()
    {
        $vars['formato']  = $this->modulo->getFormato('e07c');
        $cedula = $this->residente_helper->session()->cedula;
        
        $this->paginacion->setTotal($this->e07c_model->countAllResident($cedula));
        $limit = $this->paginacion->getLimit();
        $vars['entities'] = $this->e07c_model->findAllResident($cedula, $limit[1], $limit[0]);
        $vars['entities_administrar'] = $this->e07c_model->findAdministrarHoy($this->residente_helper->session()->cedula);
        $vars['paginacion'] = $this->paginacion->paginacion($this->load);

        $this->load->view('enfermeria/e07c_consultar', $vars);
    }
}