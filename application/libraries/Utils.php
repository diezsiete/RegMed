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

    public function controllerMethodExists($controller, $method)
    {
        $path = APPPATH.'controllers/'.$controller.'.php';
        if(!class_exists($controller) && file_exists($path)) {
            require_once($path);
        }
        return class_exists($controller) ? method_exists($controller, $method) : false;
    }

    public function thumbnail($imgSrc, $file_save = null)
    {
        //getting the image dimensions
        list($width, $height) = getimagesize($imgSrc);

        //saving the image into memory (for manipulation with GD Library)
        $myImage = imagecreatefromjpeg($imgSrc);

        // calculating the part of the image to use for thumbnail
        if ($width > $height) {
            $y = 0;
            $x = ($width - $height) / 2;
            $smallestSide = $height;
        } else {
            $x = 0;
            $y = ($height - $width) / 2;
            $smallestSide = $width;
        }

        // copying the part into thumbnail
        $thumbSize = 128;
        $thumb = imagecreatetruecolor($thumbSize, $thumbSize);
        imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);

        //final output
        if ($file_save) {
            if (imagejpeg($thumb, $file_save))
                return $file_save;
            throw new Exception("Error en generación de thumbnail");
        } else
            return $thumb;

        //print browser
        //header('Content-type: image/jpeg');
        //imagejpeg($thumb);
    }
}