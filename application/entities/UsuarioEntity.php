<?php
require_once(ENTITIES_DIR  . "Entity.php");

class UsuarioEntity extends Entity
{
    public function getEstadoLabel()
    {
        $label_class = $this->attrs->estado == "Activo" ? "label-success" : "label-danger";
        $label_text  = $label_class == "label-success" ? "Activo" : "Inactivo";
        return "<span class='label $label_class'>$label_text</span>";
    }

}