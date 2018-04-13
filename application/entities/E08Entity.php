<?php

require_once(ENTITIES_DIR  . "Entity.php");

class E08Entity extends Entity
{
    public function getAttrHtmlTensionArterial()
    {
        return ($this->tension_arterial ? $this->tension_arterial : "0") . " <small>mmHg</small>";
    }
    public function getAttrHtmlFrecuenciaCardiaca()
    {
        return $this->frecuencia_cardiaca . " <small>/min</small>";
    }
    public function getAttrHtmlFrecuenciaRespiratoria()
    {
        return $this->frecuencia_respiratoria . " <small>/min</small>";
    }
    public function getAttrHtmlSaturacion()
    {
        return $this->getSaturacion() . " <small>%</small>";
    }
    public function getSaturacion()
    {
        return $this->attrs->saturacion + 0;
    }
    public function getAttrHtmlTemperatura()
    {
        return $this->getTemperatura() . " <small>°C</small>";
    }
    public function getTemperatura()
    {
        return $this->attrs->temperatura + 0;
    }
    public function getAttrHtmlPeso()
    {
        return $this->getPeso() . " <small>kg</small>";
    }
    public function getPeso()
    {
        return $this->attrs->peso + 0;
    }

    public function getAttrHtmlGlucometria()
    {
        return $this->glucometria . " <small>mg/dL</small>";
    }
}