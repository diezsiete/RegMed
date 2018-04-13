<?php
require_once(ENTITIES_DIR  . "Entity.php");

class E21Entity extends Entity
{
    private $valoracionesDolor = [];
    
    public function __construct($attrs)
    {
        parent::__construct($attrs);
        $ci =&get_instance();
        $this->valoracionesDolor = $ci->E21_model->valoracionesDolor;
    }

    public function getValdolor()
    {
        return $this->valoracionesDolor[$this->attrs->valdolor];
    }

}