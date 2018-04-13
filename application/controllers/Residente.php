<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Controlador de bienvenida al sistema, verifica sesiones activas y redirecciona
 * acorde a rol asociado a la sesión.
 */
class Residente extends MY_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form_input');
    }
    

    public function buscar()
	{
        $prev_page = isset($_REQUEST['prev_page']) ? $_REQUEST['prev_page'] : '/welcome';
        if ($prev_page == 'residente/buscar')
            $prev_page = 'welcome';

        $redirect = false;
        $residentes = [];

        if(isset($_POST['select_resident'])){
            $this->residente_helper->session($_POST['select_resident']);
            $redirect = true;
        }
        else {
            $query = isset($_REQUEST['query']) ? $_REQUEST['query'] : '';

            $residentes = $this->residente_model->search($query);
            if (count($residentes) == 1) {
                $this->residente_helper->session($residentes[0]);
                $redirect = true;
            }
        }
        if($redirect){
            redirect($prev_page);
        }else {
            $formato = $this->modulo->getFormato('residente');
            $this->load->view('residente/buscar', ['residentes' => $residentes, 'prev_page' => $prev_page, 'formato' => $formato]);
        }
	}

    public function consultarResidente()
    {
        $this->buscar();
    }
    
    public function verResidente($id)
    {
        $session = $this->residente_helper->session();
        if(!$session || $session->cedula != $id)
            $this->residente_helper->session($id);

        $residente  = $this->residente_model->findById($id);
        $this->residente_model->entityToPost($residente);
        $this->load->view('residente/residente_ver', [
            'formato_residente' => $this->modulo->getFormato('residente'),
            'formato' => $this->modulo->getFormato('residente'),
            'residente' => $residente,
            'tab_active' => 'residente',
            'view' => true,
        ]);
    }
    
    public function consultarAcudiente()
    {
        $residente  = $this->residente_helper->session();
        $formato = $this->modulo->getFormato('acudiente');
        $model   = $this->modulo->getFormatoModel($formato);
        $cols    = $this->modulo->getFormatoConsultaCols($formato);
       
        $entities = $model->findAllResident($residente->cedula);

        $this->load->view('residente/acudiente_consultar', [
            'formato_residente' => $this->modulo->getFormato('residente'),
            'formato' => $formato,
            'residente' => $residente,
            'tab_active' => 'acudiente',
            'entities'=> $entities,
            'cols'    => $cols,
        ]);
    }

    public function crearAcudiente()
    {
        $residente= $this->residente_helper->session();
        $formato = $this->modulo->getFormato('acudiente');
        $model   = $this->modulo->getFormatoModel($formato);
        $vars    = $this->formato_helper->crear($model, $formato->consultar);

        $this->load->view('residente/acudiente_form', $vars + [
            'formato_residente' => $this->modulo->getFormato('residente'),
            'formato' => $formato,
            'tab_active' => 'acudiente',
            'view' => false,
            'residente' => $residente,
        ]);
    }
    public function verAcudiente($id)
    {
        try {
            $formato = $this->modulo->getFormato('acudiente');
            $model   = $this->modulo->getFormatoModel($formato);
            $entity  = $model->findById($id);
            $model->entityToPost($entity);
            $this->load->view('residente/acudiente_form', [
                'formato_residente' => $this->modulo->getFormato('residente'),
                'formato' => $formato,
                'tab_active' => 'acudiente',
                'view' => true,
                'residente' => $this->residente_helper->session(),
            ]);
        }catch(Exception $e){
            //TODO si no existe el id especifico
            k($e->getMessage());
        }
    }

    public function consultarObjeto()
    {
        $residente  = $this->residente_helper->session();
        $formato = $this->modulo->getFormato('objeto');
        $model   = $this->modulo->getFormatoModel($formato);
        $cols    = $this->modulo->getFormatoConsultaCols($formato);

        $entities = $model->findAllResident($residente->cedula);

        $this->load->view('residente/objeto_consultar', [
            'formato_residente' => $this->modulo->getFormato('residente'),
            'formato' => $formato,
            'residente' => $residente,
            'tab_active' => 'objeto',
            'entities'=> $entities,
            'cols'    => $cols,
        ]);
    }

    public function crearObjeto()
    {
        $residente= $this->residente_helper->session();
        $formato = $this->modulo->getFormato('objeto');
        $model   = $this->modulo->getFormatoModel($formato);
        $vars    = $this->formato_helper->crear($model, $formato->consultar);

        $this->load->view('residente/objeto_form', $vars + [
            'formato_residente' => $this->modulo->getFormato('residente'),
            'formato' => $formato,
            'tab_active' => 'objeto',
            'view' => false,
            'residente' => $residente,
        ]);
    }

    public function verObjeto($id)
    {
        try {
            $formato = $this->modulo->getFormato('objeto');
            $model   = $this->modulo->getFormatoModel($formato);
            $entity  = $model->findById($id);
            $model->entityToPost($entity);
            $this->load->view('residente/objeto_form', [
                'formato_residente' => $this->modulo->getFormato('residente'),
                'formato' => $formato,
                'tab_active' => 'objeto',
                'view' => true,
                'residente' => $this->residente_helper->session(),
            ]);
        }catch(Exception $e){
            //TODO si no existe el id especifico
            k($e->getMessage());
        }
    }
    
    
}
