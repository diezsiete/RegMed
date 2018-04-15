<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: guerrerojosedario
 * Date: 2018/03/14
 * Time: 2:56 PM
 * 
 * Metodos varios para el manejo de residentes
 */
class Residente_helper
{
    /**
     * @var stdClass
     */
    private $residenteSession = null;
    
     
    /**
     * @var Residente_model
     */
    public $residente_model;

    /**
     * @var CI_Session
     */
    public $session;
    
    
    

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->residente_model = $this->CI->residente_model;
        $this->session = $this->CI->session;
    }

    /**
     * Obtener o insertar residente en sesion
     * @param null|string|stdClass $residente
     * @return false|ResidenteEntity
     */
    public function session($residente = null)
    {
        if($residente){
            if(!is_object($residente))
                $residente = $this->residente_model->findById($residente);
            $this->session->set_userdata('residente_cedula', $residente->cedula);
            $this->residenteSession = $residente;
        }else{
            if($this->residenteSession === null){
                $residente_cedula = $this->session->userdata('residente_cedula');
                if($residente_cedula)
                    $this->residenteSession = $this->residente_model->findById($residente_cedula);
                else
                    $this->residenteSession = false;
            }
        }
        return $this->residenteSession;
    }

    
}