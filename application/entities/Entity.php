<?php


class Entity implements JsonSerializable
{
    public $attrs;
    

    /**
     * @var Utils
     */
    protected $utils;
    
    public function __construct($attrs = null)
    {
        $ci =&get_instance();
        $ci->load->library('utils');
        $this->utils = $ci->utils;
        
        $this->attrs = new stdClass();
        if($attrs)
            foreach($attrs as $attr => $val)
                $this->attrs->$attr = $val;
    }
    
    public function __get($attr)
    {
        $attr_get_method = "get".ucfirst($this->utils->toCamelCase($attr));
        if(method_exists($this, $attr_get_method))
            return $this->$attr_get_method();
        return $this->attrs->$attr;
    }
    public function __set($attr, $value)
    {
        $this->attrs->$attr = $value;
        return $this;
    }

    public function __call($name, $arguments)
    {
        $attr = null;
        if(strpos($name, 'getAttrHtml') !== false){
            $attr = $this->utils->fromCamelCase(str_replace('getAttrHtml', '', $name));
            $attr = $this->$attr;
        }else if(strpos($name, 'getAttr') !== false){
            $attr = $this->utils->fromCamelCase(str_replace('getAttr', '', $name));
            $attr = $this->$attr;
        }
        return $attr;
    }

    public function getFechaHora()
    {
        return $this->utils->dateFormat($this->attrs->fechahora, 'Y-m-d H:i:s', 'Y-m-d H:i');
    }
    
    public function trimTextarea($text, $cut_size = 76)
    {
        $html = "";
        if($text){
            $append = strlen($text) > $cut_size ? "..." : "";
            $html = substr($text, 0, $cut_size) . $append;
        }
        return $html;
    }

    function jsonSerialize()
    {
        $object = [];
        foreach($this->attrs as $key => $value)
            $object[$key] = $value;
        return $object;
    }
}