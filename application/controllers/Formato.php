<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Formato extends MY_Controller
{

    /**
     * @var Paginacion
     */
    public $paginacion;

    public function __construct()
    {
        date_default_timezone_set("America/Bogota");
        parent::__construct();
        
        $this->load->helper('html');
        $this->load->helper('security');
        $this->load->helper('date');
        $this->load->library('paginacion');

        $this->load->helper('form_input');


        //$this->modulo->esRolAcceso([1, 2, 7]);
    }

    public function _remap($method, $params = array())
    {
        return call_user_func_array(array($this, $method), $params);
    }

    /**
     * @param $formato
     */
    public function crear($formato)
    {
        try {
            $formato = $this->modulo->getFormato($formato);
            $model   = $this->modulo->getFormatoModel($formato);
            
            $vars    = $this->formato_helper->crear($model, $formato->consultar);
         
            $vars['formato'] = $formato;
            $vars['view'] = false;
            $this->load->view('formato/'.$formato->key.'_form', $vars);
        }catch(Exception $e){
            //TODO si no existe el formato
            k($e->getMessage());
        }
    }
    
    public function consultar($formato)
    {
        try {
            $formato = $this->modulo->getFormato($formato);
            $model   = $this->modulo->getFormatoModel($formato);
            $cols    = $this->modulo->getFormatoConsultaCols($formato);
            $cedula  = $this->residente_helper->session()->cedula;

            $this->paginacion->setTotal($model->countAllResident($cedula));
            $limit = $this->paginacion->getLimit();
            $entities = $model->findAllResident($this->residente_helper->session()->cedula, $limit[1], $limit[0]);

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

    public function ver($formato, $id)
    {
        try {
            $formato = $this->modulo->getFormato($formato);
            $model   = $this->modulo->getFormatoModel($formato);
            $vars    = ['formato' => $formato, 'view' => true];
            $entity  = $model->findById($id);
            $model->entityToPost($entity);
            $vars['entity'] = $entity;
            $this->load->view('formato/'.$formato->key.'_form', $vars);
        }catch(Exception $e){
            //TODO si no existe el formato o el id especifico
            k($e->getMessage());
        }
    }
    
    public function editar($formato, $id)
    {
        try {
            $formato = $this->modulo->getFormato($formato);
            $model   = $this->modulo->getFormatoModel($formato);
            $entity  = $model->findById($id);
            $vars    = $this->formato_helper->actualizar($model, $entity, $formato->consultar);
            if(!$this->input->post('actualizar'))
                $model->entityToPost($entity);

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
    
    public function borrar($formato, $id)
    {
        try {
            $formato = $this->modulo->getFormato($formato);
            $model   = $this->modulo->getFormatoModel($formato);
            $entity  = $model->findById($id);
            $this->formato_helper->borrar($model, $entity, $formato->consultar);
        }catch(Exception $e){
            //TODO si no existe el formato o da error borrar
            k($e->getMessage());
        }
    }
    

}