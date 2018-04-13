<?php
require_once(ENTITIES_DIR  . "Entity.php");

class E10Entity extends Entity
{
    
    public function getPeso()
    {
        return $this->attrs->peso + 0;
    }
    public function getAttrHtmlPeso()
    {
        return $this->getPeso() . " <small>kg</small>";
    }

    public function getAttrHtmlTalla()
    {
        return $this->talla . " <small>cm</small>";
    }

    public function getAttrHtmlTensionArterial()
    {
        return $this->tension_arterial . " <small>mmHg</small>";
    }

    public function getAttrHtmlFrecuenciaRespiratoria()
    {
        return $this->frecuencia_respiratoria . " <small>/min</small>";
    }
    public function getAttrHtmlFrecuenciaCardiaca()
    {
        return $this->frecuencia_cardiaca . " <small>/min</small>";
    }
    public function getAttrHtmlTemperatura()
    {
        return $this->temperatura . " <small>°C</small>";
    }

}