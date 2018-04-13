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
        if($attrs->cantidad > 0)
            $nombre .= " " . ($attrs->cantidad + 0)."mg";

        return $nombre;
    }


    public function getCantidad()
    {
        return $this->attrs->cantidad + 0;
    }
}