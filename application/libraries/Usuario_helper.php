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
class Usuario_helper
{
    /**
     * @var stdClass
     */
    private $usuarioSession = null;
    
    
    /**
     * @var CI_Session
     */
    public $session;
    
    
    

    public function __construct()
    {
        $ci =& get_instance();
        //$this->residente_model = $this->CI->residente_model;
        $this->session = $ci->session;
    }

    /**
     * Obtener o insertar usuario en sesion
     * @param null|string|stdClass $residente
     * @return false|stdClass
     */
    public function session($usuario = null)
    {
        if($usuario){
            /*if(!is_object($usuario))
                $residente = $this->residente_model->findById($residente);
            $this->session->set_userdata('residente_cedula', $residente->cedula);
            $this->residenteSession = $residente;*/
        }else{
            if($this->usuarioSession === null){
                $this->usuarioSession = (object)$this->session->userdata['login'];
            }
        }
        return $this->usuarioSession;
    }

    
}