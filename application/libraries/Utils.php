<?php
/**
 * V 0.3
 * kubio
 */

class Utils
{
    public function dateFormat($date_string, $format_source = 'Y-m-d H:i:s', $format_output = 'Y-m-d')
    {
        $myDateTime = DateTime::createFromFormat($format_source, $date_string);

        return $myDateTime->format($format_output);
    }

    public function dateFormatStrftime($date_string, $format_output = '%e de %B del %Y', $format_source = 'Y-m-d H:i:s')
    {
        $date = DateTime::createFromFormat($format_source, $date_string);
        return  strftime($format_output,$date->getTimestamp());
    }

    public function meses($mes_index = false)
    {

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        return $mes_index !== false ? $meses[$mes_index] : $meses;
    }

    /**
     * Numeros formateado en MySQL para ser sumados adecuadamente
     * @return string
     */
    function format_to_int()
    {
        $value = 0;
        foreach(func_get_args() as $arg){
            $value += (float)str_replace(',', '', $arg);
        }
        return number_format($value, 0);
    }

    /**
     * TODO : agregar a biblioteca
     * Version 1.0
     * @param $val
     * @return int|mixed|string
     */
    function return_bytes($val) 
    {
        $val = trim($val);
        $last = $val[strlen($val)-1];
        $val = str_replace($last, '', $val);
        switch(strtolower($last))
        {
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        }
        return $val;
    }

    function max_file_upload_in_bytes() 
    {
        //select maximum upload size

        $max_upload = $this->return_bytes(ini_get('upload_max_filesize'));
        //select post limit
        $max_post = $this->return_bytes(ini_get('post_max_size'));
        //select memory limit
        $memory_limit = $this->return_bytes(ini_get('memory_limit'));
        // return the smallest of them, this defines the real limit
        return min($max_upload, $max_post, $memory_limit);
    }

    function byte_2_size($bytes,$RoundLength=1) 
    {
        $kb = 1024;         // Kilobyte
        $mb = 1024 * $kb;   // Megabyte
        $gb = 1024 * $mb;   // Gigabyte
        $tb = 1024 * $gb;   // Terabyte

        if($bytes < $kb) {
            if(!$bytes){
                $bytes = '0';
            }
            return (($bytes + 1)-1).' B';
        } else if($bytes < $mb) {
            return round($bytes/$kb,$RoundLength).' KB';
        } else if($bytes < $gb) {
            return round($bytes/$mb,$RoundLength).' MB';
        } else if($bytes < $tb) {
            return round($bytes/$gb,$RoundLength).' GB';
        } else {
            return round($bytes/$tb,$RoundLength).' TB';
        }
    }
    
    /**
     * Convierte string camelCase a camel_case
     * @param $input
     * @param string $glue
     * @return string
     */
    function fromCamelCase($input, $glue = "_") {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode($glue, $ret);
    }

    /**
     * Convierte string convertir_camel a convertirCamel
     * @param $string
     * @param string $separator
     * @return mixed
     */
    function toCamelCase($string, $separator = "_")
    {
        // Remove underscores, capitalize words, squash, lowercase first.
        return lcfirst(str_replace(' ', '', ucwords(str_replace($separator, ' ', $string))));
    }

    /**
     * @param $input
     * @param string $glue
     * @return mixed
     * @deprecated
     */
    function from_camel_case($input, $glue = "_") {
        return $this->fromCamelCase($input, $glue);
    }

    function getScheme()
    {
        if ( (! empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https') || (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (! empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ) {
            $server_request_scheme = 'https';
        } else {
            $server_request_scheme = 'http';
        }
        return $server_request_scheme;
    }
}