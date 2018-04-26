<?php
require_once(ENTITIES_DIR  . "Entity.php");

class ResidenteEntity extends Entity
{
    public function getVerLink()
    {
        $formato = get_instance()->modulo->getFormato('residente');
        return str_replace('__id__', $this->attrs->cedula, $formato->ver);
    }

    public function getId()
    {
        return $this->attrs->cedula;
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

    public function esActivo()
    {
        return $this->attrs->activo == "Si";
    }
}