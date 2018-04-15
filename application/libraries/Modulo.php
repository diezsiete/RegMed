<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ENTITIES_DIR . 'FormatoEntity.php';
require_once ENTITIES_DIR . 'ModuloEntity.php';

/**
 * Class Modulo
 */
class Modulo
{

    /**
     * @var Residente_helper
     */
    public $residente_helper;
    
    private $modules = [];
    private $formats = [];

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    private function getModules()
    {
        if(!$this->modules){
            foreach($this->CI->config->item('modulos') as $modulo_key => $modulo_data){
                $modulo_data['key'] = $modulo_key;
                $this->modules[$modulo_key] = new ModuloEntity($modulo_data);
            }
        }
        return $this->modules;
    }

    /**
     * @param FormatoEntity $format
     * @return ModuloEntity
     * @throws Exception
     */
    private function getFormatModule($format)
    {
        $return = false;
        foreach($this->getModules() as $modulo_key => $modulo) {
            if (in_array($format->key, $modulo->formatos))
                $return = $modulo;
        }
        if(!$return)
            throw new Exception("Formato ".$format->key." no tiene modulo asociado");
        return $return;
    }

    /**
     * @param FormatoEntity $format
     * @return mixed
     * @throws Exception
     */
    private function setFormatAccessUrl($format)
    {
        $rol = $this->CI->session->userdata['login']['rol'];
        
        $residente = $this->CI->residente_helper->session();

        $modulo = $this->getFormatModule($format);
        if($modulo->accessByResidente($residente)){
            foreach(["C" => ["crear"], "R" => ["consultar", "ver"], "U" => ["editar"], "D" => ["borrar"]] as $permiso => $actions){
                $roles_permiso = $format->permiso[$permiso];
                if(in_array($rol, $roles_permiso))
                    foreach($actions as $action)
                        $format->setUrlAccion($action, $modulo->key);
                
            }
        }
        return $format;
    }

    private function getFormatsWithAccess()
    {
        $formats_access = [];
        foreach($this->CI->config->item('formatos') as $format_key => $format){
            $formato = $this->getFormato($format_key);
            $acceso = false;
            foreach(['crear', 'ver', 'editar', 'borrar', 'consultar'] as $accion)
                if($formato->$accion){
                    $acceso = true;
                    break;
                }
            if($acceso)
                $formats_access[] = $formato;
        }
        return $formats_access;
    }


    
    
    public function getFormato($format_key)
    {
        if(!isset($this->formats[$format_key])) {
            $formats = $this->CI->config->item('formatos');
            if (!isset($formats[$format_key]))
                throw new Exception("Formato '$format_key' no existe");
            $format = $formats[$format_key];
            $format['key'] = $format_key;
            $format = new FormatoEntity($format);
            $this->setFormatAccessUrl($format);
            $this->formats[$format->key] = $format;
        }
        return $this->formats[$format_key];
    }
    

    
    
    public function getFormatsByModule()
    {
        $formats_access = $this->getFormatsWithAccess();
        $moduless_access = [];
        foreach($formats_access as $format){
            $module = $this->getFormatModule($format);
            if(!isset($moduless_access[$module->key])){
                $moduless_access[$module->key] = $module;
            }
            $moduless_access[$module->key]->formatosEntity[$format->key] = $format;
        }
        return $moduless_access;
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