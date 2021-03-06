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
        
    }

    public function crearE14()
    {
        $formato = $this->modulo->getFormato('e14');
        /** @var E14_model $model */
        $model   = $this->modulo->getFormatoModel($formato);

        $redirect = $formato->consultar;
        if($this->input->post('crear_y_crear')){
            $_POST['crear'] = 'Crear';
            $redirect = $formato->crear;
        }
        $vars    = $this->formato_helper->crear($model, $redirect);

        $this->load->view('formato/e14_form', $vars + [
            'formato' => $formato,
            'view' => false,
            'crear_y_crear' => true,
        ]);
    }

    public function consultarE14global()
    {
        $formatoe14 = $this->modulo->getFormato('e14');
        $formato = clone $formatoe14;
        $formato->crear = $this->modulo->getFormato('e14global')->consultar;
        $formato->titulo = "Seguimiento Enfermería Global";
        /** @var E14_model $model */
        $model   = $this->modulo->getFormatoModel($formato);

        $vars = [];
        $this->form_validation->set_rules('residentes[]', 'Residentes', 'required');
        if($this->input->post('crear')) {
            if ($this->form_validation->run()) {
                $error_message = false;
                foreach($this->input->post('residentes') as $residente_cedula){
                    $_POST['residente_cedula'] = $residente_cedula;
                    try{
                        $model->insert($this->input, $this->session->userdata('login')['id']);
                    }catch(Exception $e){
                        $error_message = $e->getMessage();
                    }
                }
                if($error_message)
                    $vars['error_message'] = $error_message;
                else
                    $vars['insert_message'] = "Formatos creados exitosamente para los residentes seleccionados";

                //limpiamos post para que no aparezca nada seleccionado
                $_POST = [];
                $fields_na = ['bano', 'alimentacion', 'lubricacion', 'sueno', 'curacion', 'terapia_fisica',
                    'terapia_ocupacional', 'eliminacion', 'deambulacion'];
                foreach($fields_na as $field)
                    $_POST[$field]  = "n/a";
                $_POST['orientacion'] = ["Tiempo", "Persona", "Lugar"];
            }
        }
        
        $this->load->view('formato/e14_form', $vars + [
            'residente' => $this->residente_helper->session(),
            'residentes' => $this->residente_model->findAllActive(),
            'view' => false,
            'formato' => $formato
        ]);
    }
    
    
    public function consultarE07c()
    {
        $vars['formato'] = $formato = $this->modulo->getFormato('e07c');
        $cedula = $this->residente_helper->session()->cedula;
        
        $this->paginacion->setTotal($this->e07c_model->countAllResident($cedula));
        $limit = $this->paginacion->getLimit();
        $vars['entities'] = $this->e07c_model->findAllResident($cedula, $limit[1], $limit[0]);
        $vars['paginacion'] = $this->paginacion->paginacion($this->load);
        
        if($formato->crear)
            $vars['entities_administrar'] = $this->e07c_model->findAdministrarHoy($this->residente_helper->session()->cedula);
        
        $this->load->view('enfermeria/e07c_consultar', $vars);
    }


    public function consultarE08()
    {
        $formato = $this->modulo->getFormato('e08');
        $model   = $this->modulo->getFormatoModel($formato);
        $cols    = $this->modulo->getFormatoConsultaCols($formato);
        $cedula  = $this->residente_helper->session()->cedula;

        $this->paginacion->setTotal($model->countAllResident($cedula));
        $limit = $this->paginacion->getLimit();
        $entities = $model->findAllResident($this->residente_helper->session()->cedula, $limit[1], $limit[0]);

        $this->load->view('enfermeria/e08_consultar', [
            'formato' => $formato,
            'entities'=> $entities,
            'cols'    => $cols,
            'paginacion' => $this->paginacion->paginacion($this->load),
            'tab_active' => 'consultar'
        ]);
    }

    public function graficasE08()
    {
        $formato = $this->modulo->getFormato('e08');
        $model   = $this->modulo->getFormatoModel($formato);

        /** @var E08Entity[] $entities */
        $entities = $model->findAllResident($this->residente_helper->session()->cedula, 50);


        $graf_data = [
            'tension_arterial' => ['sistolica' => [], 'diastolica' => []],
            'frecuencia_cardiaca' => [],
            'frecuencia_respiratoria' => [],
            'saturacion' => [],
            'temperatura' => [],
            'peso' => [],
            'glucometria' => [],
        ];
        foreach($entities as $entity){
            foreach($graf_data as $attr => &$data) {
                if($attr == 'tension_arterial') {
                    $data['sistolica'][] = [
                        'x' => $entity->fechahora,
                        'y' => $entity->getTensionArterialSistolica()
                    ];
                    $data['diastolica'][] = [
                        'x' => $entity->fechahora,
                        'y' => $entity->getTensionArterialDiastolica()
                    ];
                }else
                    $data[] = [
                        'x' => $entity->fechahora,
                        'y' => $entity->$attr
                    ];
            }
        }
        
        $this->load->view('enfermeria/e08_graficas', [
            'formato' => $formato,
            'entities'=> $entities,
            'tab_active' => 'graficas',
            'graf_data' => $graf_data
        ]);
    }
    
}