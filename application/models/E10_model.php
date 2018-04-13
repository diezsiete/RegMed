<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ENTITIES_DIR . 'E10Entity.php';

class E10_model extends MY_Model
{

    protected $table = 'e10';
    protected $entityClass = 'E10Entity';
    
    public $fields = [
        ['field' => 'residente_cedula', 'label' => 'Cedula',            'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'peso',             'label' => 'Peso',              'rules' => 'trim|required|max_length[10]'],
        ['field' => 'talla',            'label' => 'Talla',             'rules' => 'trim|required|max_length[10]'],
        ['field' => 'tension_arterial',  'label' => 'Tensión Arterial',  'rules' => 'trim|required|max_length[10]'],
        ['field' => 'frecuencia_respiratoria','label' => 'Frecuencia Respiratoria','rules' => 'trim|required|max_length[10]'],
        ['field' => 'frecuencia_cardiaca','label' => 'Frecuencia Cardíaca','rules' => 'trim|required|max_length[10]'],
        ['field' => 'temperatura',      'label' => 'Temperatura',       'rules' => 'trim|required|max_length[10]'],
        ['field' => 'saturacion_o2',     'label' => 'Saturación O2',     'rules' => 'trim|required|max_length[10]'],
        ['field' => 'info_cabeza','label' => 'Información Cabeza','rules' => 'trim|required|max_length[200]'],
        ['field' => 'info_cara',  'label' => 'Información Cara',  'rules' => 'trim|required|max_length[200]'],
        ['field' => 'info_cuello','label' => 'Información Cuello','rules' => 'trim|required|max_length[200]'],
        ['field' => 'info_torax', 'label' => 'Información Torax', 'rules' => 'trim|required|max_length[200]'],
        ['field' => 'info_abdomen','label' => 'Información Abdomen','rules' => 'trim|required|max_length[200]'],
        ['field' => 'info_genitourinario','label' => 'Información Genitourinario', 'rules' => 'trim|required|max_length[200]'],
        ['field' => 'info_osteoarticular','label' => 'Información osteoarticular', 'rules' => 'trim|required|max_length[200]'],
        ['field' => 'diagnostico',      'label' => 'Diagnóstico',       'rules' => 'trim|required|max_length[200]'],
        ['field' => 'fechahora',  'label' => 'Fecha y hora de registro','rules' => 'trim|required'],
    ];
    
}
?>
