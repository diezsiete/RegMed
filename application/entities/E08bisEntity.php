<?php

require_once(ENTITIES_DIR  . "Entity.php");

class E08bisEntity extends Entity
{
    public function getAttrHtmlTensionArterial()
    {
        return ($this->tension_arterial + 0) . " <small>mmHg</small>";
    }
    public function getAttrHtmlFrecuenciaCardiaca()
    {
        return ($this->frecuencia_cardiaca + 0) . " <small>/min</small>";
    }
}