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

    public function getFotoSrc($thumb = false)
    {
        $foto_path = get_instance()->modulo->getProfilePhotoDefault();
        if($this->attrs->foto_name) {
            $foto_name = $this->attrs->foto_name;
            if($thumb){
                $explode = explode('.', $foto_name);
                $explode[count($explode)-2] .= '-thumb';
                $foto_name = implode('.', $explode);
            }
            $foto_path = get_instance()->modulo->getProfilePhotoPath() . "/" . $foto_name;
        }
        return site_url($foto_path);
    }

}