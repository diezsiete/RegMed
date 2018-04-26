<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once ENTITIES_DIR . 'E11Entity.php';

class E11_model extends MY_Model
{
    
    protected $table = 'e11';
    protected $entityClass = 'E11Entity';
    
    public $fields = [
        ['field' => 'fechahora',        'label' => 'Fecha de registro', 'rules' => 'trim|required'],
        ['field' => 'residente_cedula', 'label' => 'Cedula',            'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'observaciones',    'label' => 'Observaciones',     'rules' => 'trim|required'],
        ['field' => 'recomendaciones',  'label' => 'Recomendaciones',   'rules' => 'trim'],
    ];
    
}
?>
