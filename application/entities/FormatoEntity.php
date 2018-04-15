<?php

require_once(ENTITIES_DIR  . "Entity.php");

class FormatoEntity extends Entity
{
    
    public $consultar = false;
    public $crear = false;
    public $ver = false;
    public $editar = false;
    public $borrar = false;

    public function setUrlAccion($accion, $modulo_key)
    {
        $id = false;
        if($accion == 'ver' || $accion == 'editar' || $accion == 'borrar')
            $id = true;
        
        $formato_key = $this->attrs->key;
        $default_url = "formato/$accion/$formato_key" . ($id ? '/__id__' : '');
        $controller =  isset($this->attrs->controller) ? $this->attrs->controller  : $modulo_key;
        if($this->utils->controllerMethodExists(ucfirst($controller), $accion.ucfirst($formato_key)))
            $default_url = "$controller/$accion/$formato_key" . ($id ? '/__id__' : '');;
        $this->$accion = $default_url;
    }
    
    public function getCodigo()
    {
        return isset($this->attrs->codigo) ? $this->attrs->codigo : "";
    }
    
}