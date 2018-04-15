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

    private function explodeTensionArterial()
    {
        if(strstr($this->tension_arterial, '/'))
            $ta = explode('/', $this->tension_arterial, 2);
        else
            $ta = explode(' ', $this->tension_arterial, 2);
        return $ta;
    }


    public function getTensionArterialSistolica()
    {
        $ta = $this->explodeTensionArterial();
        return count($ta) == 2 ? trim($ta[0]) : 0;
    }
    public function getTensionArterialDiastolica()
    {
        $ta = $this->explodeTensionArterial();
        return count($ta) == 2 ? trim($ta[1]) : 0;
    }
}