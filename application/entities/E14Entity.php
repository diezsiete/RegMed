<?php

require_once(ENTITIES_DIR  . "Entity.php");

class E14Entity extends Entity
{
    /**
     * @var E14_model
     */
    private $E14_model;


    public $alimentacion = [];
    public $orientacion = [];
    public $eliminacion = [];

    public function __construct($attrs)
    {
        parent::__construct($attrs);
        $this->alimentacion = explode(',', $this->attrs->alimentacion);
        $this->orientacion  = explode(',', $this->attrs->orientacion);
        $this->eliminacion  = explode(',', $this->attrs->eliminacion);

        $ci =&get_instance();
        $this->E14_model = $ci->E14_model;
    }

    public function getAttrHtmlAlimentacion(){
        $html = "";
        foreach($this->E14_model->getAlimentaciones(true) as $alimentacion){
            if($alimentacion['label'] != "n/a" && in_array($alimentacion['label'], $this->alimentacion) ) {
                $html .= "<span class='label label-success formato-table-badge'>" . $alimentacion["label"] . "</span>";
            }
        }
        return $html;
    }

    public function getAttrHtmlOrientacion(){
        $html = "";
        foreach($this->E14_model->getOrientaciones(true) as $orientacion){
            if($orientacion['label'] != "n/a" && $orientacion['label'] != "Ninguno") {
                $label_class = in_array($orientacion['label'], $this->orientacion) ? 'label-primary' : 'label-default';
                $html .= "<span class='label $label_class formato-table-badge'>" . $orientacion["abrev"] . "</span>";
            }
        }
        return "<span class='label label-gray formato-table-badge'>Orientacion " .$html . "</span>";
    }

    public function getAttrHtmlEliminacion(){
        $html = "";
        foreach($this->E14_model->getEliminaciones(true) as $eliminacion){
            if($eliminacion['label'] != "n/a" && in_array($eliminacion['label'], $this->eliminacion)) {
                $html .= "<span class='label label-orange formato-table-badge'>" . $eliminacion["label"] . "</span>";
            }
        }
        return $html;
    }

    public function getAttrHtmlBano(){
        return "<span class='label label-info formato-table-badge'>Baño " . $this->bano . "</span>";
    }
    public function getAttrHtmlLubricacion(){
        return "<span class='label label-light-blue formato-table-badge'>Lubricacion " . $this->lubricacion . "</span>";
    }
    public function getAttrHtmlCuracion(){
        $val = $this->curacion == "Si" ? "Curación" : "No curación";
        return "<span class='label label-purple formato-table-badge'>$val</span>";
    }
    public function getAttrHtmlTerapiaFisica(){
        $val = $this->terapia_fisica == "Si" ? "Terapia fisica" : "No terapia fisica";
        return "<span class='label label-warning formato-table-badge'>$val</span>";
    }
    public function getAttrHtmlTerapiaOcupacional(){
        $val = $this->terapia_ocupacional == "Si" ? "Terapia ocupacional" : "No terapia ocupaciona";
        return "<span class='label label-maroon formato-table-badge'>$val</span>";
    }
    public function getAttrHtmlSueno(){
        return "<span class='label label-danger formato-table-badge'>Sueño " . $this->sueno . "</span>";
    }
    public function getAttrHtmlDeambulacion(){
        return "<span class='label label-danger formato-table-badge'>Deambulación " . $this->deambulacion . "</span>";
    }

    public function getAttrHtmlObservaciones(){
        return $this->trimTextarea($this->observaciones, 150);
    }

    public function getResumen(){
        $html = "<div class='row'>";
        $fields = ['bano', 'alimentacion', 'lubricacion', 'curacion', 'terapia_fisica', 'terapia_ocupacional',
            'eliminacion', 'sueno', 'deambulacion', 'orientacion'];
        foreach($fields as $field){
            $val = $this->attrs->$field;

            if($val != "n/a"){
                $html .= "<div class='col-xs-12'>";
                $label = $this->E14_model->getField($field)['label'];
                $fn = "getAttrHtml".ucfirst($this->utils->toCamelCase($field));
                $val = $this->$fn();
                $html .= $val;
                $html .= "</div>";
            }

        }
        $html .= "</div>";
        return $html;
    }
}