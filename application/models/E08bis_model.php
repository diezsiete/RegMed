<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ENTITIES_DIR . 'E08bisEntity.php';


class E08bis_model extends MY_Model
{
    
    protected $table = 'e08bis';
    protected $entityClass = 'E08bisEntity';
    
    public $fields = [
        ['field' => 'residente_cedula', 'label' => 'Cedula Residente',  'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'fechahora',        'label' => 'Fecha y hora',      'rules' => 'trim|required'],
        ['field' => 'tension_arterial', 'label' => 'Tensión Arterial',  'rules' => 'trim|numeric'],
        ['field' => 'frecuencia_cardiaca','label' => 'Frecuencia Cardiaca','rules' => 'trim|numeric'],
        ['field' => 'observaciones',    'label' => 'Observaciones',     'rules' => 'trim|max_length[200]'],
        ['field' => 'tratamiento',      'label' => 'Tratamiento',       'rules' => 'trim|max_length[300]'],
        ['field' => 'diagnostico',      'label' => 'Diagnóstico',       'rules' => 'trim|max_length[100]'],
    ];
}
?>
