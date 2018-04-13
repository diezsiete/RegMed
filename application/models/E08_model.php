<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ENTITIES_DIR . 'E08Entity.php';


class E08_model extends MY_Model
{
    
    protected $table = 'e08';
    protected $entityClass = 'E08Entity';
    
    public $fields = [
        ['field' => 'residente_cedula',     'label' => 'Cedula Residente',  'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'fechahora',            'label' => 'Fecha hora de control', 'rules' => 'trim|required'],
        ['field' => 'tension_arterial',     'label' => 'Tension Arterial',  'rules' => 'trim|max_length[15]'],
        ['field' => 'frecuencia_cardiaca',  'label' => 'Frecuencia Cardiaca','rules' => 'trim|max_length[11]|numeric'],
        ['field' => 'frecuencia_respiratoria','label' => 'Frecuencia Respiratoria','rules' => 'trim|max_length[11]|numeric'],
        ['field' => 'saturacion',           'label' => 'Saturacion O2',     'rules' => 'trim|max_length[11]|numeric'],
        ['field' => 'temperatura',          'label' => 'Temperatura',       'rules' => 'trim|max_length[11]|numeric'],
        ['field' => 'peso',                 'label' => 'Peso',              'rules' => 'trim|max_length[11]|numeric'],
        ['field' => 'glucometria',          'label' => 'Glucometria',       'rules' => 'trim|max_length[11]|numeric'],
        ['field' => 'observaciones',        'label' => 'Observaciones',     'rules' => 'trim|required|max_length[300]']
    ];
}
?>
