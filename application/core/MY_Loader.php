<?php


class MY_Loader extends CI_Loader
{
    
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel($model_name)
    {
        $ci =&get_instance();
        if(!isset($ci->$model_name)){
            $ci->load->model($model_name);
        }
        return $ci->$model_name;
    }

    public function getUsuarioSession()
    {
        return get_instance()->usuario_helper->getUsuarioEntitySession();
    }
    
}