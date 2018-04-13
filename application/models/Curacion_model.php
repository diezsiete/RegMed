<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once ENTITIES_DIR . 'E07Entity.php';


class Curacion_model extends MY_Model
{
    
    protected $table = 'curacion';
    //protected $entityClass = 'E07Entity';
    
    public $fields = [
        ['field' => 'residente_cedula', 'label' => 'Cedula Residente',  'rules' => 'trim|required|max_length[20]|numeric'],
        ['field' => 'fechahora',        'label' => 'Fecha de curación', 'rules' => 'required'],
        ['field' => 'tipo_curacion',    'label' => 'Tipo de curación',  'rules' => 'trim|max_length[500]'],
        ['field' => 'acciones',         'label' => 'Acciones',          'rules' => 'trim|max_length[500]'],
        ['field' => 'evolucion',        'label' => 'Evolución',         'rules' => 'trim|max_length[300]'],
        ['field' => 'observacion',      'label' => 'Observaciones',     'rules' => 'trim|max_length[500]']
    ];
}
?>
