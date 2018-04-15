<?php
require_once(ENTITIES_DIR  . "Entity.php");

class ResidenteEntity extends Entity
{
    public function getVerLink()
    {
        $formato = get_instance()->modulo->getFormato('residente');
        return str_replace('__id__', $this->attrs->cedula, $formato->ver);
    }

    public function getId()
    {
        return $this->attrs->cedula;
    }

}