<?php

require_once(ENTITIES_DIR  . "Entity.php");
require_once(ENTITIES_DIR  . "MedicamentoEntity.php");

class E07cEntity extends Entity
{
    protected $medicamento = null;

    public function getHora()
    {
        return $this->utils->dateFormat($this->attrs->fechahora, 'Y-m-d H:i:s', 'H:i');
    }
    public function getFecha()
    {
        return $this->utils->dateFormat($this->attrs->fechahora, 'Y-m-d H:i:s', 'Y-m-d');
    }
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
}