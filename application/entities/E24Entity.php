<?php
require_once(ENTITIES_DIR  . "Entity.php");

class E24Entity extends Entity
{
    
    public function getPeso()
    {
        return $this->attrs->peso + 0;
    }
    public function getAttrHtmlPeso()
    {
        return $this->getPeso() . " <small>kg</small>";
    }
    
    public function getPesoImc()
    {
        return $this->attrs->peso_imc + 0;
    }

    public function getAttrHtmlGlucometria()
    {
        return $this->glucometria . " <small>mg/dL</small>";
    }

}