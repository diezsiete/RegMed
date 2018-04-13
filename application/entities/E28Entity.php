<?php
require_once(ENTITIES_DIR  . "Entity.php");

class E28Entity extends Entity
{

    public function getAttrHtmlPeso()
    {
        return ($this->peso + 0) . " <small>kg</small>";
    }

    public function getAttrHtmlGluco()
    {
        return $this->gluco . " <small>mg/dL</small>";
    }

    public function getAttrHtmlEvol()
    {
        $html = "";
        switch ($this->evol){
            case "-" : $html = "Disminuyó"; break;
            case "=" : $html = "Pemanecio constante"; break;
            case "+" : $html = "Aumentó"; break;
        }
        return $html;
    }

}