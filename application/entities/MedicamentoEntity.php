<?php

require_once(ENTITIES_DIR  . "Entity.php");

class MedicamentoEntity extends Entity
{
    public function getNombreCompleto()
    {
        $attrs = $this->attrs;
        $nombre = $attrs->nombre;
        if($attrs->presentacion)
            $nombre .= " " . $attrs->presentacion;
        $nombre .= " " . $this->getAttrHtmlCantidad();

        return $nombre;
    }


    public function getCantidad()
    {
        return $this->attrs->cantidad + 0;
    }



    public function getAttrHtmlCantidad()
    {
        if($this->attrs->cantidad_excepcional)
            return $this->attrs->cantidad_excepcional;
        return $this->getCantidad() . " " . $this->attrs->cantidad_unidad;
    }
}