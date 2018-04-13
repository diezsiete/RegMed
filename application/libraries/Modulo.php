<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Modulo
 */
class Modulo
{

    /**
     * @var Residente_helper
     */
    public $residente_helper;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    protected function controllerMethodExists($controller, $method)
    {
        $path = APPPATH.'controllers/'.$controller.'.php';
        if(!class_exists($controller) && file_exists($path)) {
            require_once($path);
        }
        return class_exists($controller) ? method_exists($controller, $method) : false;
    }

    protected function getUrlCrear($modulo_key, $formato)
    {
        $formato_key = $formato['key'];
        $default_url = "formato/crear/$formato_key";
        $controller =  isset($formato['controller']) ? $formato['controller']  : $modulo_key;
        if($this->controllerMethodExists(ucfirst($controller), "crear".ucfirst($formato_key)))
            $default_url = "$controller/crear/$formato_key";
        return $default_url;
    }
    protected function getUrlConsultar($modulo_key, $formato)
    {
        $formato_key = $formato['key'];
        $default_url = "formato/consultar/$formato_key";
        $controller =  isset($formato['controller']) ? $formato['controller']  : $modulo_key;
        if($this->controllerMethodExists(ucfirst($controller), "consultar".ucfirst($formato_key)))
            $default_url = "$controller/consultar/$formato_key";
        return $default_url;
    }
    protected function getUrlVer($modulo_key, $formato)
    {
        $formato_key = $formato['key'];
        $default_url = "formato/ver/$formato_key/__id__";
        $controller =  isset($formato['controller']) ? $formato['controller']  : $modulo_key;
        if($this->controllerMethodExists(ucfirst($controller), "ver".ucfirst($formato_key)))
            $default_url = "$controller/ver/$formato_key/__id__";
        return $default_url;
    }
    protected function getUrlEditar($modulo_key, $formato)
    {
        $formato_key = $formato['key'];
        $default_url = "formato/editar/$formato_key/__id__";
        $controller =  isset($formato['controller']) ? $formato['controller']  : $modulo_key;
        if($this->controllerMethodExists(ucfirst($controller), "editar".ucfirst($formato_key)))
            $default_url = "$controller/editar/$formato_key/__id__";
        return $default_url;
    }
    protected function getUrlBorrar($modulo_key, $formato)
    {
        $formato_key = $formato['key'];
        $default_url = "formato/borrar/$formato_key/__id__";
        return $default_url;
    }

    protected function getFormatoModulo($formato_key)
    {
        $return = false;
        foreach($this->CI->config->item('modulos') as $modulo_key => $modulo)
            if(in_array($formato_key, $modulo['formatos']))
                $return = ['key' => $modulo_key, 'modulo' => $modulo];
        return $return;
    }

    protected function setFormatoPermission(&$formato)
    {
        $rol = $this->CI->session->userdata['login']['rol'];
        $residente = $this->CI->residente_helper->session();
        $modulos = $this->CI->config->item('modulos');

        $formato += ['consultar' => false, 'crear' => false, 'ver' => false, 'editar' => false, 'borrar' => false];

        $modulo_key_modulo = $this->getFormatoModulo($formato['key']);
        $modulo_key = $modulo_key_modulo['key'];
        $modulo = $modulo_key_modulo['modulo'];
        $modulo_residente = !isset($modulo['residente']) || !$modulo['residente'] || ($modulo['residente'] && $residente);
        if ($modulo_residente && in_array($rol, $modulo['roles'])) {
            if (!isset($formato['roles']) || in_array($rol, $formato['roles'])) {
                $formato['crear'] = $this->getUrlCrear($modulo_key, $formato);
                $formato['editar'] = $this->getUrlEditar($modulo_key, $formato);
                $formato['borrar'] = $this->getUrlBorrar($modulo_key, $formato);
            }
        }
        foreach($modulos as $modulo_key => $modulo){
            $modulo_residente = !isset($modulo['residente']) || !$modulo['residente'] || ($modulo['residente'] && $residente);
            if ($modulo_residente && in_array($rol, $modulo['roles'])) {
                foreach ($modulo['consulta'] as $formatos_consulta) {
                    foreach ($formatos_consulta as $formato_key) {
                        if($formato_key == $formato['key']) {
                            $formato['consultar'] = $this->getUrlConsultar($modulo_key_modulo['key'], $formato);
                            $formato['ver'] = $this->getUrlVer($modulo_key_modulo['key'], $formato);
                        }
                    }
                }
            }
        }
        return $formato;
    }

    /**
     * @param string $formato_key
     * @return stdClass
     * @throws Exception
     */
    public function getFormato($formato_key)
    {
        $formatos = $this->CI->config->item('formatos');
        if(!isset($formatos[$formato_key]))
            throw new Exception("Formato '$formato_key' no existe");
        $formato = $formatos[$formato_key];
        $formato['key'] = $formato_key;
        $this->setFormatoPermission($formato);
        return (object)$formato;
    }

    /**
     * Obtiene todos los formatos que tiene acceso. agrega keys si puede crear y/o consultar
     * @return array
     */
    public function getFormatosAcceso()
    {
        $formatos_acceso = [];
        foreach($this->CI->config->item('formatos') as $formato_key => $formato){
            $formato = $this->getFormato($formato_key);
            $acceso = false;
            foreach(['crear', 'ver', 'editar', 'borrar', 'consultar'] as $accion)
                if($formato->$accion){
                    $acceso = true;
                    break;
                }
            if($acceso)
                $formatos_acceso[] = $formato;
        }
        return $formatos_acceso;
    }
    
    public function getFormatosAccesoByModulo()
    {
        $formatos_acceso = $this->getFormatosAcceso();
        $modulos_acceso = [];
        
        foreach($formatos_acceso as $formato){
            $formato_modulo = $this->getFormatoModulo($formato->key);
            $modulo = $formato_modulo['modulo'];
            if(!isset($modulos_acceso[$formato_modulo['key']])){
                $modulo['formatos'] = [];
                unset($modulo['consulta']);
                $modulos_acceso[$formato_modulo['key']] = $modulo;
            }
            $modulos_acceso[$formato_modulo['key']]['formatos'][$formato->key] = $formato;
        }
        return $modulos_acceso;
        
    }
    

    /**
     * @param $formato
     * @return MY_Model
     * @throws Exception
     */
    public function getFormatoModel($formato)
    {
        $formato = is_string($formato) ? $this->getFormato($formato) : $formato;
        $model = isset($formato->model) ? $formato->model : ucfirst($formato->key)."_model";
        $this->CI->load->model($model);
        return $this->CI->$model;
    }

    /**
     * @param $formato
     * @return array
     * @throws Exception
     */
    public function getFormatoConsultaCols($formato)
    {
        $formato = is_string($formato) ? $this->getFormato($formato) : $formato;
        $cols = $this->CI->config->item('formatos_consulta')[$formato->key]['cols'];
        $cols_return = [];
        foreach($cols as $col)
            $cols_return[] = (object)$col;
        return $cols_return;
    }
    
    public function formatoExiste($formato_key)
    {
        return isset($this->CI->config->item('formatos')[$formato_key]);
    }


}