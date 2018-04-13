<?php
require_once(ENTITIES_DIR  . "Entity.php");

class E35Entity extends Entity
{
    private $indicadores = [
        'cabello_facil' => 'Cabello',
        'encias' => 'Encias',
        'palidez' => 'Palidez',
        'pigmentacion' => 'Pigmentación',
        'dermatitis' => 'Dermatits',
        'edema' => 'Edema'
    ];

    public function getPeso()
    {
        return $this->attrs->peso + 0;
    }
    public function getAttrHtmlPeso()
    {
        return $this->getPeso() . " <small>kg</small>";
    }
    public function getPesoConv()
    {
        return $this->attrs->peso_conv + 0;
    }

    public function getAttrHtmlTalla()
    {
        return $this->talla . " <small>cm</small>";
    }

    public function getAlturaRodilla()
    {
        return $this->attrs->altura_rodilla + 0;
    }
    public function getCirBrazo()
    {
        return $this->attrs->cir_brazo + 0;
    }
    public function getCarpo()
    {
        return $this->attrs->carpo + 0;
    }

    public function getAttrHtmlProblemaDigestivo()
    {
        return $this->problema_digestivo ? $this->problema_digestivo : "No";
    }
    public function getImc()
    {
        return $this->attrs->imc + 0;
    }


    public function getIndicadoresHtml()
    {
        $html = "";
        foreach($this->indicadores as $key => $indicador){
            if($this->$key == "S")
                $html .= "<span class='label label-danger formato-table-badge'>" . $indicador . "</span>";
        }
        return $html;
    }

}