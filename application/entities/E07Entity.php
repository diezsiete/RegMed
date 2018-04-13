<?php

require_once(ENTITIES_DIR  . "Entity.php");

class E07Entity extends Entity
{
    public $horas = [];

    public function getMedNombre()
    {
        $attrs = $this->attrs;
        $nombre = $attrs->medicamento_nombre . ($attrs->medicamento_presentacion ? " ".$attrs->medicamento_presentacion : "")
            . ($attrs->medicamento_cantidad > 0 ? " ".($attrs->medicamento_cantidad + 0)."mg" : "");
        //$nombre .= " [".$attrs->medicamento_via."]";
        return $nombre;
    }
    
    public function getHorasDosisBadges()
    {
        $html = "";
        foreach($this->horas as $hora){
            $html .= "<span class='badge bg-gray hora'>$hora</span>";
        }
        return $html;
    }


    public function getMedicamentoCantidad()
    {
        return $this->attrs->medicamento_cantidad + 0;
    }
}