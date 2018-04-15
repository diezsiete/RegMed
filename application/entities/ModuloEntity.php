<?php

require_once(ENTITIES_DIR  . "Entity.php");

class ModuloEntity extends Entity
{

    public $formatosEntity = [];

    public function __construct($attrs)
    {
        parent::__construct($attrs);
        if(!isset($this->attrs->residente))
            $this->attrs->residente = false;
    }

    public function accessByResidente($residente = null)
    {
        return !$this->attrs->residente || ($this->attrs->residente && $residente);
    }
}