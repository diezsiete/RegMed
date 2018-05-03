<?php

require_once(ENTITIES_DIR  . "Entity.php");
require_once(ENTITIES_DIR  . "MedicamentoEntity.php");

class E07Entity extends Entity
{
    protected $medicamento = null;

    public $horas = [];

    /**
     * @return MedicamentoEntity|null
     */
    public function getMedicamento()
    {
        if($this->medicamento === null) {
            $attrs_medicamento = [];
            foreach ($this->attrs as $attr => $val)
                if (strpos($attr, 'medicamento') !== false) {
                    $attrs_medicamento[str_replace('medicamento_', '', $attr)] = $val;
                }
            if($attrs_medicamento) {
                $this->medicamento = new MedicamentoEntity($attrs_medicamento);
            }
        }
        return $this->medicamento;
    }

    public function getMedNombre()
    {
        return $this->getMedicamento()->getNombreCompleto();
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