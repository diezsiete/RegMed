<?php
require_once(ENTITIES_DIR  . "Entity.php");

class E11Entity extends Entity
{

    public function getAttrHtmlObservaciones()
    {
        return $this->trimTextarea($this->observaciones);
    }

    public function getAttrHtmlRecomendaciones()
    {
        return $this->trimTextarea($this->recomendaciones);
    }

}